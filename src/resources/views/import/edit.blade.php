@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Mettre à jour un produit</h1>
            </div>

            @include('components.alerts')

            <form method="post" action="{{ action('ProductController@update', $product->id) }} }}"
                  enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PATCH">

                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                           aria-controls="home" aria-selected="true">Général</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="false">Attributs</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Catégorie du produit</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                    @foreach( $categories as $category)
                                        <option value="{{ $category->id }}" {{$category->id == $product->category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Marque</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                                    @foreach( $brands as $brand)
                                        <option value="{{ $brand->id }}" {{$brand->id == $product->brand->id ? 'selected' : ''}}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputTitle">Nom du produit</label>
                                <input type="text" class="form-control" id="exampleInputTitle"
                                       aria-describedby="nameHelp"
                                       name="name" required value="{{ $product->name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputTitle">Description</label>
                                <textarea type="text" class="form-control" id="exampleInputTitle"
                                          aria-describedby="descHelp" name="description"
                                          required>{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputTitle">Réf. Constructeur</label>
                                <input type="text" class="form-control" id="exampleInputTitle"
                                       aria-describedby="constructorHelp" name="constructor_reference" required
                                       value="{{ $product->constructor_reference }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputTitle">Réf. Connexing</label>
                                <input type="text" class="form-control" id="exampleInputTitle"
                                       aria-describedby="connexingHelp" name="connexing_reference" required
                                       value="{{ $product->connexing_reference }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputTitle">Prix</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">€</span>
                                    </div>
                                    <input type="number" class="form-control" id="exampleInputTitle"
                                           aria-describedby="connexingHelp" data-number-to-fixed="2"
                                           data-number-stepfactor="100" name="price" value="00,00" step="0.01" required
                                           value="{{ $product->price }}">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputTitle">Lien vers le site ecommerce</label>
                                <input type="text" class="form-control" id="exampleInputTitle"
                                       aria-describedby="connexingHelp" name="url_ecommerce" required
                                       value="{{ $product->url_ecommerce }}">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Attribut1</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                                    <option value="1">default_value1</option>
                                    <option value="2">default_value2</option>
                                    <option value="3">default_value3</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Attribut2</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                                    <option value="1">default_value1</option>
                                    <option value="2">default_value2</option>
                                    <option value="3">default_value3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mt-4 mb-4 d-flex justify-content-between col-sm-12">
                    <a href="{{action('ProductController@index')}}" class="btn btn-outline-primary">
                        Retour
                    </a>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>

            </form>


        </div>



    @endslot

@endcomponent