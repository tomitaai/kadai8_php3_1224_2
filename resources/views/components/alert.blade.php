@if (session()->has('status'))
	<div class="flex justify-between p-4 items-center bg-gray-500 text-white rounded-lg border-2 border-white">{{ session('status') }}</div>
@endif