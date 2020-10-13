<nav id="menu" class="navbar">
    <div class="nav-inner container">
        <div class="navbar-header"><span id="category" class="visible-xs">Categories</span>
            <button type="button" class="btn btn-navbar navbar-toggle" ><i class="fa fa-bars"></i></button>
        </div>
        <div class="navbar-collapse">
            <ul class="main-navigation">
                <li><a href="{{ route('shop', ['id'=>'shop']) }}"   class="parent"  >Home</a> </li>
                <li><a href="{{ route('allProduct') }}"   class="parent"  >Shop</a> </li>


                @foreach ( App\Models\Sections::orderBy('name','asc')->get() as $section )
                {{-- <li><a href="{{ route('allcategoryProduct',[$section->id]) }}" class="active parent"> {{ $section->name }} <i class="fa fa-caret-down"></i> </a> --}}
                    <li><a href="#" class="active parent" class="ex2"> {{ $section->name }} <i class="fa fa-caret-down"></i> </a>
                        <ul>

                            @foreach ($section->categories as $category)
                            <li>
                                <a href="{{ route('allcategoryProduct',[$category->id]) }}" class="ex2" >{{ $category->name }}</a>
                            </li>
                            @endforeach

                        </ul>
                    </li>
                @endforeach
               
                    <li><a href="#" class="active parent">others<i class="fa fa-caret-down"></i></a>
                        <ul>
                            <li><a href="blog.html" class="parent"  >Blog</a></li>
                            <li><a href="about-us.html" >About us</a></li>
                            <li><a href="contact.html" >Contact Us</a> </li>
                        </ul>
                    </li> 
                
            </ul>
        </div>
    </div>
</nav>