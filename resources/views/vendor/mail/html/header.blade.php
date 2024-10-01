<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="http://pawanregmi.com.np/uploads/site-title.png" width="300" markdown="1" alt="Food ordering Logo" />
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
