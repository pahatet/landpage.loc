<div class="container">

@if(isset($menu))

        <!-- Brand and toggle get grouped for better mobile display -->
    c
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand page-scroll" href="#home">Paha start</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">

            <li class="hidden">
                    <a href="#home"></a>
            </li>

            @foreach($menu as $item)

                <li>
                    <a class="page-scroll" href="#{{ $item['alias'] }}">{{ $item['title'] }}</a> 
                </li>
                
            @endforeach

        </ul>
    </div>
    <!-- /.navbar-collapse -->

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if(count($errors) > 0)
        <div class="alert alert-danger">
           <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach   
            </ul>     
        </div>
    @endif

@endif

</div>
<!-- /.container-fluid -->


