<div class="table-responsive">
    <table class="table align-middle w-auto">
        <thead class="text-center table-header table-info">
            <tr>
                <th class="py-3">Item</th>
                <th class="py-3">Specification</th>
                <th class="py-3">Graphic & Design</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($products as $key=>$product)
            <tr class="product-row">
                <td class="item w-25">
                    <div class="text-center product-details">
                        <h5>{{$product->model}} {{$product->brand}}</h5>
                        <img src="{{url('/images/macbook1.jpg')}}" class="img-fluid rounded" alt="Image" width="50%" />
                        <p class="price text-success fw-bold">${{$product->price}}</p>
                        <p class="rating text-warning">Rating: {{$product->rating == 0.0? 'N/A' : $product->rating}} ★</p>
                    </div>
                </td>
                <td class="specification w-25">
                    <ul class="list-unstyled">
                        <li><strong>Screen:</strong> {{$product->screen_size}}"</li>
                        <li><strong>Harddisk:</strong> {{$product->harddisk}}</li>
                        <li><strong>CPU:</strong> {{$product->cpu}}</li>
                        <li><strong>Speed:</strong> {{$product->cpu_speed}}</li>
                        <li><strong>RAM:</strong> {{$product->ram}}</li>
                        <li><strong>OS:</strong> {{$product->OS}}</li>
                    </ul>
                </td>
                <td class="graphic w-25">
                    <ul class="list-unstyled">
                        <li><strong>Color:</strong> {{$product->color}}</li>
                        <li><strong>Special Features:</strong> {{$product->special_features}}</li>
                        <li><strong>Graphics:</strong> {{$product->graphics}}</li>
                        <li><strong>Graphics Co-Processor:</strong> {{$product->graphics_coprocessor}}</li>
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{!! $products->links() !!}