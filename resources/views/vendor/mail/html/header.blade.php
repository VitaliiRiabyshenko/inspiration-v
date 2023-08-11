@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Inspiration')
{{-- <img src="{{ asset('/img/icon/logo-black.svg') }}" class="logo" alt="Inpiration Logo"> --}}
<img src="https://inspirationvisa.com/img/icon/favicon.png" style="mix-blend-mode: color-burn" class="logo" alt="Inpiration Logo">
<h1>{{ $slot }}</h1>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
