@extends ('frontend.layout')

@section ('title') eBooking prueba de PHP @stop

@section ('description') Tercer ejercicio de la prueba de eBooking. @stop


@section ('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 pr-5">
                <h3 >Add Product</h3>
                {!! Form::open(array('url' => '/store', 'method' => 'post')) !!}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            {!! Form::label('category', 'Category') !!}
                            {!! Form::text('category',null,['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-3">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name',null,['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-3">
                            {!! Form::label('price', 'Price') !!}
                            <div class="input-group">
                                {!! Form::number('price',null,['class' => 'form-control']) !!}
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 offset-md-3">
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Create</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>

            <div class="col-sm-6">
                <h3>Products</h3>
                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->category }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ money_format('%.2n',$product->price) }} €</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@stop

@section ('template-styles')

@stop

@section('template-scripts')

@stop

@section('script')

@stop
