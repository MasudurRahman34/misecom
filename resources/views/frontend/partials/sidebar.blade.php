<div id="column-left" class="col-sm-3 hidden-xs column-left">
    <div class="column-block">
        <div class="columnblock-title">Categories</div>
        <div class="category_block">
            <ul class="box-category treeview-list treeview">
                @foreach ( App\Models\Section::orderBy('name','asc')->get() as $sections )
                {{-- <li><a href="{{ route('allcategoryProduct',[$section->id]) }}" class="active parent"> {{ $section->name }} <i class="fa fa-caret-down"></i> </a> --}}
                    <li><a href="#" class="active parent" class="ex2"> {{ $sections->name }} </a>
                        <ul>
                             @foreach ( App\Models\Backend\Category::orderBy('name','desc')->where('section_id',$sections->id)->whereNull('category_id')->get() as $category)
                                <li> <h4> <a href="{{ route('allcategoryProduct',[$category->id]) }}" class="activSub ex2"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> {{ $category->name }}</a></h4>
                                    <ul>
                                        @foreach ($category->subCategory as $subCategory)
                                            <li><a class="ex2" href="{{ route('allcategoryProduct',[$subCategory->id]) }}"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> {{ $subCategory->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
               
                    {{-- <li><a href="#" class="activSub">Laptops &amp; Notebooks</a>
                        <ul>
                            <li><a href="#">Macs</a></li>
                            <li><a href="#">Windows</a></li>
                        </ul>
                        </li>
                        <li><a href="#" class="activSub">Components</a>
                            <ul>
                                <li><a href="#">Mice and Trackballs</a></li>
                                <li><a href="#" class="activSub" >Monitors</a>
                                    <ul>
                                        <li><a href="#"  >test 1</a></li>
                                        <li><a href="#"  >test 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Windows</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Tablets</a></li>
                        <li><a href="#">Software</a></li>
                        <li><a href="#">Phones & PDAs</a></li>
                        <li><a href="#">Cameras</a></li>
                        <li><a href="#">MP3 Players</a></li> 
                    --}}
            </ul>
        </div>
    </div>
    {{-- latest-blog --}}
    {{-- @include('frontend.partials.saidbar-latest-blog') --}}

    {{-- latest-product-list --}}
    {{-- @include('frontend.partials.saidbar-latest-product-list') --}}

    {{-- specials-product-list --}}
    {{-- @include('frontend.partials.saidbar-specials-product-list') --}}

</div>