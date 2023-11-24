<h2>Detail</h2>
<li>{{ $device->name }}</li>
<li>{{ $device->brand }}</li>
<img width="100px" src="{{ Storage::url($device->img) }}" alt="">
<li>{{ $device->is_active }}</li>
<li>{{ $device->describe }}</li>
