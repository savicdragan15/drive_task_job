<div class="container">
<nav class="navbar navbar-inverse">
    <div class="container-fluid ">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">Bookstore</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                {{--Category dropdown menu --}}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Categories <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach(App\Category::nested()->get() as $category)
                            <li><a href="{{ url('/category', [$category['slug']]) }}">{{ $category['name'] }}</a></li>
                        @endforeach
                    </ul>
                </li>
                {{--Category dropdown menu END--}}
                {{--Authors dropdown menu --}}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Authors <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach(App\Author::all() as $author)
                            <li><a href="{{ url('/author', $author->slug) }}">{{ $author->author_name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                {{--Authors dropdown menu END--}}
            </ul>

                <ul class="nav navbar-nav navbar-right">
                    <form action="{{ url('search') }}" method="GET" class="navbar-form navbar-left">
                        <div class="form-group">
                            <input name="string" class="form-control mr-sm-2" placeholder="Search" type="text">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> 1</a>
                        <ul class="dropdown-menu dropdown-cart" role="menu">
                            <li>
                  <span class="item">
                    <span class="item-left">
                        <img src="http://lorempixel.com/50/50/" alt="">
                        <span class="item-info">
                            <span>Item name</span>
                            <span>23$</span>
                        </span>
                    </span>
                    <span class="item-right">
                        <button class="btn btn-xs btn-danger pull-right">x</button>
                    </span>
                </span>
                            </li>
                            <li>
                  <span class="item">
                    <span class="item-left">
                        <img src="http://lorempixel.com/50/50/" alt="">
                        <span class="item-info">
                            <span>Item name</span>
                            <span>23$</span>
                        </span>
                    </span>
                    <span class="item-right">
                        <button class="btn btn-xs btn-danger pull-right">x</button>
                    </span>
                </span>
                            </li>
                            <li>
                  <span class="item">
                    <span class="item-left">
                        <img src="http://lorempixel.com/50/50/" alt="">
                        <span class="item-info">
                            <span>Item name</span>
                            <span>23$</span>
                        </span>
                    </span>
                    <span class="item-right">
                        <button class="btn btn-xs btn-danger pull-right">x</button>
                    </span>
                </span>
                            </li>
                            <li>
                  <span class="item">
                    <span class="item-left">
                        <img src="http://lorempixel.com/50/50/" alt="">
                        <span class="item-info">
                            <span>Item name</span>
                            <span>23$</span>
                        </span>
                    </span>
                    <span class="item-right">
                        <button class="btn btn-xs btn-danger pull-right">x</button>
                    </span>
                </span>
                            </li>
                            <li class="divider"></li>
                            <li><a class="text-center" href="">View Cart</a></li>
                        </ul>
                    </li>
                </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
</div>