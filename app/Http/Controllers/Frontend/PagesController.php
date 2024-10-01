<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Chat;
use App\Models\Order;
use App\Models\Region;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Reviewable;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
  public function index()
  {
    $products = Product::paginate(6);
    $sections = Section::all();
    $sliders = Slider::query()->where('active', '1')->get();
    return view('home.index', compact('sliders', 'sections'))->with('products', $products);
  }
  public function epay()
  {
    return view("home.epay");
  }
  public function menu()
  {
    $categories = Category::all();
    return view('home.menu')->with('categories', $categories);
  }
  public function profile()
  {
    $user_info = auth()->user();

    $orders = Order::where('user_id', auth()->user()->id)->orderByDesc('created_at')->get();
    return view('home.profile')->with('user_info', $user_info)->with('orders', $orders);
  }
  public function browse($id)
  {

    $products = Product::where('category_id', $id)->get();
    //  if($products->count()==0){
    //    abort(404);
    //  }
    $category = Category::findorfail($id);
    $cname = $category->name;
    return view('home.browse')->with('products', $products)->with('cname', $cname);
  }
  public function veggie()
  {
    $products = Product::where('isVeg', '1')->where('isDrink', '0')->where('onStock', '1')->paginate(6);
    return view('home.veggie')->with('products', $products);
  }
  public function search(Request $request)
  {
    $query = $request->input('query', '');
    //$productsData = Product::orderBy('name', 'asc')->get();
    $productsData = Product::all();

    //QuickSort Algorithm
    function quicksort($array)
    {
      if (count($array) < 2) {
        return $array;
      }
      $left = $right = [];
      $pivot = $array[0]; // Use the first element as the pivot
      for ($i = 1; $i < count($array); $i++) {
        if (strtolower($array[$i]->name) < strtolower($pivot->name)) {
          $left[] = $array[$i];
        } else {
          $right[] = $array[$i];
        }
      }
      // Recursively sort the left and right arrays
      return array_merge(quicksort($left), [$pivot], quicksort($right));
    };

    //Quicksort Algorithm ends
    $sortedProducts = quicksort($productsData);
    // If you need to search among models, you should do it with the models directly.

    //Binary Search algorithm
    $searchProducts = function ($products, $query) {
      $low = 0;
      $high = count($products) - 1;
      $result = [];
      $initialMatchIndex = -1;

      while ($low <= $high) {
        $mid = (int)(($low + $high) / 2);

        if (strpos(strtolower($products[$mid]->name), strtolower($query)) !== false) {
          $initialMatchIndex = $mid;
          break;
        }

        if (strtolower($products[$mid]->name) < strtolower($query)) {
          $low = $mid + 1;
        } else {
          $high = $mid - 1;
        }
      }

      if ($initialMatchIndex === -1) {
        return $result;
      }

      for ($i = $initialMatchIndex; $i >= 0; $i--) {
        if (strpos(strtolower($products[$i]->name), strtolower($query)) !== false) {
          $result[] = $products[$i];
        } else {
          break;
        }
      }

      for ($i = $initialMatchIndex + 1; $i < count($products); $i++) {
        if (strpos(strtolower($products[$i]->name), strtolower($query)) !== false) {
          $result[] = $products[$i];
        } else {
          break;
        }
      }

      return $result;
    };
    //Binary Search Algorithm Ends Here

    $searchResults = $searchProducts($sortedProducts, $query);

    return view('home.search')->with('products', $searchResults)->with('query', $query);
  }


  public function drinks()
  {
    $products = Product::where('isDrink', '1')->where('onStock', '1')->paginate(6);
    return view('home.drinks')->with('products', $products);
  }
  public function viewProduct($id)
  {
    $product = Product::findorfail($id);
    $similars = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->limit(3)->get();
    return view('home.products.show')->with('product', $product)->with('similars', $similars);
  }

  public function checkout()
  {
    if (session('cart')) {
      $regions = Region::all();
      return view('home.checkout')->with('regions', $regions);
    } else {
      abort(404, 'No Items To Checkout');
    }
  }
  public function usendmsg(Request $request)
  {
    $data = $request->validate([
      'text' => 'required',
      'order_id' => 'required |exists:orders,id',
    ]);
    $data['user_id'] = auth()->user()->id;
    Chat::create($data);
    return redirect("orders/$request->order_id#chatbox");
  }
}
