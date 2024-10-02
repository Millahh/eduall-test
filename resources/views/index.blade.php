<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EduALL Test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">


        <!-- Styles -->
        @vite(['resources/js/app.js', 'resources/css/app.css'])
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>
    <body class="p-5">
        <h2 class="text-center">Discover Your Laptop</h2>
        <div class="form-outline my-3" data-mdb-input-init>
            <input type="search" name="search" id="search" class="form-control search-input border-2 rounded" placeholder="Search here.." aria-label="Search" />
        </div>
        <div class="all_products">
            <div class="table-responsive">
                <table class="table align-middle w-auto" id="product-table">
                    <thead class="text-center table-header table-info">
                        <tr>
                            <th class="py-3">Item</th>
                            <th class="py-3">Specification</th>
                            <th class="py-3">Graphic & Design</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($products as $key => $product)
                            <tr class="product-row">
                                <td class="item w-25">
                                    <div class="text-center product-details">
                                        <h5>{{$product->model}} {{$product->brand}}</h5>
                                        <img src="{{url('/images/macbook1.jpg')}}" class="img-fluid rounded" alt="Image" width="50%" />
                                        <p class="price text-success fw-bold">${{$product->price}}</p>
                                        <p class="rating text-warning">Rating: {{$product->rating == 0.0 ? 'N/A' : $product->rating}} ★</p>
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
            <div class="no-products-message"></div>
        </div>
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <script>
            //pagination
            $(document).on('click', '.pagination a', function(e){
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                let search_string = $('#search').val();
                product(page, search_string);
            });

            function product(page, search_string = '') {
                $.ajax({
                    url: "/pagination/paginate-data?page=" + page,
                    method: 'GET',
                    data: { search: search_string },
                    success: function(res) {
                        $('#search').val(search_string);
                        if (res.status == 'nothing_found') {
                            $('.all_products').html('<p class="text-danger">' + res.message + '</p>'); // Show no products found message
                            $('.table').hide(); // Hide the table
                        } else {
                            $('.all_products').html(res); // Show the products
                            $('.table').show(); // Show the table again
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", error); // Log any AJAX errors
                    }
                });
            }


            //search product
            $(document).on('keyup', '#search', function(e){
                e.preventDefault();
                let search_string = $('#search').val();
                product(1, search_string);
            });
        </script>
    </body>
</html>
