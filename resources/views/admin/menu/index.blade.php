@extends('admin.layout.master')
@section('pageTitle', 'Menu')
@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Menu</h5>
                    <a href="{{ route('menu.create') }}"class="btn btn-primary">Ceate Menu</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h3>Main Header Menu</h3>
                        <div class="menu-box">
                            {{-- @dd($mega_menus->count()) --}}
                            @if ($menu_items->count() > 0)
                                <ol class="menu-list sortable">
                                    @foreach ($menus as $menu)
                                        @if ($menu->parent_id == null)
                                            <li id="menuItem_{{ $menu->id }}">
                                                <div class="flex_box">
                                                    <a href="javascript:void(0)">{{ $menu->name }}</a>
                                                    <div class="action_button">
                                                        <a class="btn btn-danger"
                                                            href="{{ route('menu.edit', $menu->id) }}"><i
                                                                class="fas fa-edit"></i></a>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#exampleModal_{{ $menu->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal_{{ $menu->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Are you sure you want to delete it!
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <form action="{{ route('menu.delete', $menu->id) }}"
                                                                            method="POST">
                                                                            @method('delete')
                                                                            @csrf
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">No</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Yes</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- model End  --}}

                                                    </div>
                                                </div>
                                                <ol class="submenu-list">
                                                    @foreach ($menu->childrens as $submenu)
                                                        <li>
                                                            <div class="flex_box">
                                                                <a href="javascript:void(0)">{{ $submenu->name }}</a>
                                                                <div class="action_button">
                                                                    <a class="btn btn-danger btn-sm"
                                                                        href="{{ route('menu.edit', $submenu->id) }}"><i
                                                                            class="fas fa-edit"></i></a>
                                                                    <!-- Button trigger modal -->
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-toggle="modal"
                                                                        data-target="#exampleModal_o{{ $submenu->id }}">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                    <!-- Modal -->
                                                                    <div class="modal fade"
                                                                        id="exampleModal_o{{ $submenu->id }}"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        {{ $submenu->id }}Are you sure you
                                                                                        want to
                                                                                        delete it!
                                                                                    </h5>
                                                                                    <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>

                                                                                <div class="modal-footer">
                                                                                    <form
                                                                                        action="{{ route('menu.delete', $submenu->id) }}"
                                                                                        method="POST">
                                                                                        @method('delete')
                                                                                        @csrf
                                                                                        <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-dismiss="modal">No</button>
                                                                                        <button type="submit"
                                                                                            class="btn btn-primary">Yes</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- model End  --}}
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ol>
                                            </li>
                                        @endif
                                    @endforeach
                                    <div class="form-group mt-4">
                                        <button type="button" class="btn btn-success btn-sm btn-flat" id="serialize"><i
                                                class="fa fa-save"></i>
                                            Update Menu
                                        </button>
                                    </div>
                                </ol>
                            @else
                                <p class="text-center">Menu not found in database</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h3>Footer Quick Link Menu</h3>
                        <div class="menu-box">
                            @if ($menu_footer->count() > 0)

                                <ol class="menu-list sortable">
                                    @foreach ($menu_footer as $item)
                                        @if ($item->parent_id == null)
                                            <li>
                                                <div class="flex_box">
                                                    <a href="javascript:void(0)">{{ $item->name }}</a>
                                                    <div class="action_button">
                                                        <a class="btn btn-danger btn-sm"
                                                            href="{{ route('menu.edit', $item->id) }}"><i
                                                                class="fas fa-edit"></i></a>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-primary"
                                                            data-toggle="modal"
                                                            data-target="#exampleModal_l{{ $item->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal_l{{ $item->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Are you sure you want to
                                                                            delete it!
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <form
                                                                            action="{{ route('menu.delete', $item->id) }}"
                                                                            method="POST">
                                                                            @method('delete')
                                                                            @csrf
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">No</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Yes</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- model End  --}}
                                                    </div>
                                                </div>
                                                <ol class="submenu-list">
                                                    @foreach ($item->childrens as $submenu)
                                                        <li>
                                                            <div class="flex_box">
                                                                <a href="javascript:void(0)">{{ $submenu->name }}</a>
                                                                <div class="action_button">
                                                                    <a class="btn btn-danger btn-sm" href=""><i
                                                                            class="fas fa-edit"></i></a>
                                                                    <a class="btn btn-success btn-sm" href=""><i
                                                                            class="fas fa-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ol>
                                            </li>
                                        @endif
                                    @endforeach
                                </ol>
                            @else
                                <p class="text-center">Menu not found in database</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6"></div>
                </div>

                <h3>Header/Mega Menu</h3>
                <div class="menu-box">

                    @if ($mega_menus->count() > 0)
                        <ol class="menu-list sortable">
                            @foreach ($b_menus as $menu)
                                @if ($menu->parent_id == null)
                                    <li id="menuItem_{{ $menu->id }}">
                                        <div class="flex_box">
                                            <a href="javascript:void(0)">{{ $menu->name }}</a>
                                            <div class="action_button">
                                                <a class="btn btn-danger btn-sm"
                                                    href="{{ route('menu.edit', $menu->id) }}"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal_{{ $menu->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal_{{ $menu->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Are you sure you want to delete it!
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <form action="{{ route('menu.delete', $menu->id) }}"
                                                                    method="POST">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">No</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Yes</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- model End  --}}

                                            </div>
                                        </div>
                                        <ol class="submenu-list">
                                            @foreach ($menu->childrens as $submenu)
                                                <li>
                                                    <div class="flex_box">
                                                        <a href="javascript:void(0)">{{ $submenu->name }}</a>
                                                        <div class="action_button">
                                                            <a class="btn btn-danger btn-sm"
                                                                href="{{ route('menu.edit', $submenu->id) }}"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary"
                                                                data-toggle="modal"
                                                                data-target="#exampleModal_o{{ $submenu->id }}">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                            <!-- Modal -->
                                                            <div class="modal fade"
                                                                id="exampleModal_o{{ $submenu->id }}" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">
                                                                                {{ $submenu->id }}Are you sure you want to
                                                                                delete it!
                                                                            </h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <form
                                                                                action="{{ route('menu.delete', $submenu->id) }}"
                                                                                method="POST">
                                                                                @method('delete')
                                                                                @csrf
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">No</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Yes</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- model End  --}}
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ol>
                                    </li>
                                @endif
                            @endforeach
                            <div class="form-group mt-4">
                                <button type="button" class="btn btn-success btn-sm btn-flat" id="serialize"><i
                                        class="fa fa-save"></i>
                                    Update Menu
                                </button>
                            </div>
                        </ol>
                    @else
                        <p class="text-center">Menu not found in database</p>
                    @endif
                </div>

                <br>
                <br>
                <h3>Top header Menu</h3>
                <div class="menu-box">

                    @if ($top_header_ribbon->count() > 0)
                        <ol class="menu-list sortable">
                            @foreach ($top_ribbon as $menu)
                                @if ($menu->parent_id == null)
                                    <li id="menuItem_{{ $menu->id }}">
                                        <div class="flex_box">
                                            <a href="javascript:void(0)">{{ $menu->name }}</a>
                                            <div class="action_button">
                                                <a class="btn btn-danger btn-sm"
                                                    href="{{ route('menu.edit', $menu->id) }}"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal_{{ $menu->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal_{{ $menu->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Are you sure you want to delete it!
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <form action="{{ route('menu.delete', $menu->id) }}"
                                                                    method="POST">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">No</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Yes</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- model End  --}}

                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach

                        </ol>
                    @else
                        <p class="text-center">Menu not found in database</p>
                    @endif
                </div>

                <br>
                <br>
                <h3>Footer Feature Menu</h3>
                <div class="menu-box">

                    @if ($feature_link->count() > 0)
                        <ol class="menu-list sortable">
                            @foreach ($feature_link as $menu)
                                @if ($menu->parent_id == null)
                                    <li id="menuItem_{{ $menu->id }}">
                                        <div class="flex_box">
                                            <a href="javascript:void(0)">{{ $menu->name }}</a>
                                            <div class="action_button">
                                                <a class="btn btn-danger btn-sm"
                                                    href="{{ route('menu.edit', $menu->id) }}"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal_{{ $menu->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal_{{ $menu->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Are you sure you want to delete it!
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <form action="{{ route('menu.delete', $menu->id) }}"
                                                                    method="POST">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">No</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Yes</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- model End  --}}

                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach

                        </ol>
                    @else
                        <p class="text-center">Menu not found in database</p>
                    @endif
                </div>

                <br>
                <br>
                <br>

                <div class="row">
                    <div class="col-lg-2">
                        <div class="cover_box">
                            <label for="">Page Template Layout</label>
                            <img src="{{ asset('backend/pagestyle.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="cover_box">
                            <label for="">Layout page Style</label>
                            <img src="{{ asset('backend/layoutstyle.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts')
    <script src="{{ asset('backend/sortablejs/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backend/sortablejs/jquery.mjs.nestedSortable.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.sortable').nestedSortable({
                forcePlaceholderSize: true,
                items: 'li',
                handle: 'a',
                placeholder: 'menu-highlight',
                listType: 'ol',
                maxLevels: 2,
                opacity: .6,
            });
        });
    </script>
    <script>
        // $('ol.sortableLists').nestedSortable({
        //     forcePlaceholderSize: true,
        //     placeholder: 'placeholder',
        //     handle: 'div.menu-handle',
        //     helper: 'clone',
        //     items: 'li',
        //     opacity: .6,
        //     maxLevels: 1,
        //     revert: 250,
        //     tabSize: 25,
        //     tolerance: 'pointer',
        //     toleranceElement: '> div',
        // });

        $("#serialize").click(function(e) {

            e.preventDefault();
            $(this).prop("disabled", true);
            $(this).html(
                `<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Updating...`
            );
            var serialized = $('ol.sortable').nestedSortable('serialize');
            console.log(serialized);
            $.ajax({
                url: "{{ route('updateMenuOrder') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    sort: serialized
                },
                success: function(res) {
                    toastr.options.closeButton = true
                    toastr.success('Menu Order Successfuly', "Success !");
                    $('#serialize').prop("disabled", false);
                    $('#serialize').html(`<i class="fa fa-save"></i> Update Menu`);
                }
            });
        });
    </script>
    <script>
        jQuery(document).ready(function() {
            /* =============== DEMO =============== */
            // menu items
            // var arrayjson = [{
            //         href: "#",
            //         icon: "fas fa-home",
            //         text: "Home",
            //         target: "_top",
            //         title: "My Home",
            //     },
            //     {
            //         icon: "fas fa-chart-bar",
            //         text: "Opcion2"
            //     },
            //     {
            //         icon: "fas fa-bell",
            //         text: "Opcion3"
            //     },
            //     {
            //         icon: "fas fa-crop",
            //         text: "Opcion4"
            //     },
            //     {
            //         icon: "fas fa-flask",
            //         text: "Opcion5"
            //     },
            //     {
            //         icon: "fas fa-map-marker",
            //         text: "Opcion6"
            //     },
            //     {
            //         icon: "fas fa-search",
            //         text: "Opcion7",
            //         children: [{
            //             icon: "fas fa-plug",
            //             text: "Opcion7-1",
            //             children: [{
            //                 icon: "fas fa-filter",
            //                 text: "Opcion7-1-1"
            //             }],
            //         }, ],
            //     },
            // ];
            // icon picker options
            var iconPickerOptions = {
                searchText: "Buscar...",
                labelHeader: "{0}/{1}",
            };
            // sortable list options
            var sortableListOptions = {
                placeholderCss: {
                    "background-color": "#cccccc"
                },
            };

            var editor = new MenuEditor("myEditor", {
                listOptions: sortableListOptions,
                iconPicker: iconPickerOptions,
            });
            var editor1 = new MenuEditor("myEditor1", {
                listOptions: sortableListOptions,
                iconPicker: iconPickerOptions,
            });
            // editor.setForm($("#frmEdit"));
            // editor.setUpdateButton($("#btnUpdate"));
            // $("#btnReload").on("click", function() {
            //     editor.setData(arrayjson);
            // });

            // $("#btnOutput").on("click", function() {
            //     var str = editor.getString();
            //     $("#out").text(str);
            // });

            // $("#btnUpdate").click(function() {
            //     editor.update();
            // });

            // $("#btnAdd").click(function() {
            //     editor.add();
            // });
            /* ====================================== */

            /** PAGE ELEMENTS **/
            // $('[data-toggle="tooltip"]').tooltip();
            // $.getJSON(
            //     "https://api.github.com/repos/davicotico/jQuery-Menu-Editor",
            //     function(data) {
            //         $("#btnStars").html(data.stargazers_count);
            //         $("#btnForks").html(data.forks_count);
            //     }
            // );
        });
    </script>
@endpush
