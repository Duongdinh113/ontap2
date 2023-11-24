<h2>Detail</h2>
<li>{{ $device->name }}</li>
<li>{{ $device->serial }}</li>
<li>{{ $device->model }}</li>
<img width="100px" src="{{ Storage::url($device->img) }}" alt="">
<li>{{ $device->name }}</li>
<li>{{ $device->is_active }}</li>
