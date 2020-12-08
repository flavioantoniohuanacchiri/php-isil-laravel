@if(isset($buttons))
	@foreach($buttons as $key => $value)
		@php
			$btnClass = "btn btn-sm";
			$iconClass = "fas";
			
			if (is_object($value)) {
				$value = json_decode(json_encode($value), true);
			}
			$dataId = $value["row"]["id"];
			if (isset($value["class"])) {
				$btnClass = $value["class"];
			}
			if (isset($value["icon"])) {
				$iconClass = $value["icon"];
			}
		@endphp
		<button class="{{$btnClass}}" data-id="{{$dataId}}">
			<i class="{{$iconClass}}"></i>
		</button>
	@endforeach
@endif