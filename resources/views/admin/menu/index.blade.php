@extends('admin.layout.master')
@section('content')
    <style type="text/css">
        .container {
            margin: 150px auto;
        }

        body {
            background-color: #fafafa;
        }

        ol.example li.placeholder:before {
            position: absolute;
        }

        .list-group-item>div {
            margin-bottom: 5px;
        }
    </style>
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h4 class="card-title">Menu</h4>
                    <a href="{{ route('menu.create') }}"class="btn btn-primary">Ceate Menu</a>
                </div>
            </div>
            <div class="card-body">

                <h3>Header Menu</h3>
                @if ($menu_items->count() > 0)
                    <ol id="myEditor" class="sortableLists list-group">
                        @foreach ($menus as $menu)
                            @if ($menu->parent_id == null)
                                <li class="list-group-item pr-0 sortableListsOpen" id="menuItem_{{$menu->id}}"
                                    style="width: auto; position: relative; top: 0px; left: 0px; visibility: visible;">
                                    <div style="overflow: auto;"><span class="sortableListsOpener btn btn-success btn-sm"
                                            style="float: none; display: inline-block; background-position: center center; background-repeat: no-repeat; margin-right: 10px;"><i
                                                class="fas fa-minus"></i></span><i></i>&nbsp;<span
                                            class="txt">{{$menu->id}}{{ $menu->name }}</span>
                                        <div class="btn-group float-right">
                                            <a class="btn btn-secondary btn-sm btnUp btnMove clickable" href="#"
                                                style="display: none;">
                                                <i class="fas fa-angle-up clickable"></i>
                                            </a>
                                            <a class="btn btn-secondary btn-sm btnDown btnMove clickable" href="#"
                                                style="">
                                                <i class="fas fa-angle-down clickable"></i>
                                            </a>
                                            <a class="btn btn-secondary btn-sm btnIn btnMove clickable" href="#"
                                                style="display: none;">
                                                <i class="fas fa-level-up-alt clickable"></i>
                                            </a>
                                            <a class="btn btn-secondary btn-sm btnOut btnMove clickable" href="#"
                                                style="display: none;">
                                                <i class="fas fa-level-down-alt clickable"></i>
                                            </a>
                                            <a class="btn btn-primary btn-sm btnEdit clickable" href="#">
                                                <i class="fas fa-edit clickable"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm btnRemove clickable" href="#">
                                                <i class="fas fa-trash-alt clickable"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <ol class="pl-0" style="padding-top: 10px; display: block;">
                                        @foreach ($menu->childrens as $submenu)
                                            <li class="list-group-item pr-0" id="menuItem_{{$submenu->id}}"
                                                style="width: auto; position: relative; top: 0px; left: 0px; visibility: visible;">
                                                <div style="overflow: auto;"><i></i>&nbsp;<span
                                                        class="txt">{{ $submenu->name }}</span>
                                                    <div class="btn-group float-right">
                                                        <a class="btn btn-secondary btn-sm btnUp btnMove clickable"
                                                            href="#" style="display: none;">
                                                            <i class="fas fa-angle-up clickable"></i>
                                                        </a>
                                                        <a class="btn btn-secondary btn-sm btnDown btnMove clickable"
                                                            href="#" style="display: none;">
                                                            <i class="fas fa-angle-down clickable"></i>
                                                        </a>
                                                        <a class="btn btn-secondary btn-sm btnIn btnMove clickable"
                                                            href="#" style="display: none;">
                                                            <i class="fas fa-level-up-alt clickable"></i>
                                                        </a>
                                                        <a class="btn btn-secondary btn-sm btnOut btnMove clickable"
                                                            href="#" style="">
                                                            <i class="fas fa-level-down-alt clickable"></i>
                                                        </a>
                                                        <a class="btn btn-primary btn-sm btnEdit clickable" href="#">
                                                            <i class="fas fa-edit clickable"></i>
                                                        </a>
                                                        <a class="btn btn-danger btn-sm btnRemove clickable" href="#">
                                                            <i class="fas fa-trash-alt clickable"></i>
                                                        </a>
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
                <br>
                <br>
                <br>
                <br>
                <h3>Footer Menu</h3>
                {{-- @dd($menu_footer) --}}
                @if ($menu_footer->count() > 0)
                    <ol id="myEditor1" class="sortableLists list-group">
                        @foreach ($menu_footer as $item)
                            @if ($item->parent_id == null)
                                <li class="list-group-item pr-0 sortableListsOpen"
                                    style="width: auto; position: relative; top: 0px; left: 0px; visibility: visible;">
                                    <div style="overflow: auto;"><span class="sortableListsOpener btn btn-success btn-sm"
                                            style="float: none; display: inline-block; background-position: center center; background-repeat: no-repeat; margin-right: 10px;"><i
                                                class="fas fa-minus"></i></span><i></i>&nbsp;<span
                                            class="txt">{{ $item->name }}</span>
                                        <div class="btn-group float-right">
                                            <a class="btn btn-secondary btn-sm btnUp btnMove clickable" href="#"
                                                style="display: none;">
                                                <i class="fas fa-angle-up clickable"></i>
                                            </a>
                                            <a class="btn btn-secondary btn-sm btnDown btnMove clickable" href="#"
                                                style="">
                                                <i class="fas fa-angle-down clickable"></i>
                                            </a>
                                            <a class="btn btn-secondary btn-sm btnIn btnMove clickable" href="#"
                                                style="display: none;">
                                                <i class="fas fa-level-up-alt clickable"></i>
                                            </a>
                                            <a class="btn btn-secondary btn-sm btnOut btnMove clickable" href="#"
                                                style="display: none;">
                                                <i class="fas fa-level-down-alt clickable"></i>
                                            </a>
                                            <a class="btn btn-primary btn-sm btnEdit clickable" href="#">
                                                <i class="fas fa-edit clickable"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm btnRemove clickable" href="#">
                                                <i class="fas fa-trash-alt clickable"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <ol class="pl-0" style="padding-top: 10px; display: block;">
                                        @foreach ($item->childrens as $submenu)
                                            <li class="list-group-item pr-0"
                                                style="width: auto; position: relative; top: 0px; left: 0px; visibility: visible;">
                                                <div style="overflow: auto;"><i></i>&nbsp;<span
                                                        class="txt">{{ $submenu->name }}</span>
                                                    <div class="btn-group float-right">
                                                        <a class="btn btn-secondary btn-sm btnUp btnMove clickable"
                                                            href="#" style="display: none;">
                                                            <i class="fas fa-angle-up clickable"></i>
                                                        </a>
                                                        <a class="btn btn-secondary btn-sm btnDown btnMove clickable"
                                                            href="#" style="display: none;">
                                                            <i class="fas fa-angle-down clickable"></i>
                                                        </a>
                                                        <a class="btn btn-secondary btn-sm btnIn btnMove clickable"
                                                            href="#" style="display: none;">
                                                            <i class="fas fa-level-up-alt clickable"></i>
                                                        </a>
                                                        <a class="btn btn-secondary btn-sm btnOut btnMove clickable"
                                                            href="#" style="">
                                                            <i class="fas fa-level-down-alt clickable"></i>
                                                        </a>
                                                        <a class="btn btn-primary btn-sm btnEdit clickable"
                                                            href="#">
                                                            <i class="fas fa-edit clickable"></i>
                                                        </a>
                                                        <a class="btn btn-danger btn-sm btnRemove clickable"
                                                            href="#">
                                                            <i class="fas fa-trash-alt clickable"></i>
                                                        </a>
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
                    <p class="text-center">Menu not found in databas</p>
                @endif

            </div>
        </div>
    </div>
@stop
@push('scripts')
    <script src="{{ asset('backend/sortablejs/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backend/sortablejs/jquery.mjs.nestedSortable.js') }}"></script>
    <script>
        $('ol.sortableLists').nestedSortable({
            forcePlaceholderSize: true,
            placeholder: 'placeholder',
            handle: 'div.menu-handle',
            helper: 'clone',
            items: 'li',
            opacity: .6,
            maxLevels: 1,
            revert: 250,
            tabSize: 25,
            tolerance: 'pointer',
            toleranceElement: '> div',
        });

        $("#serialize").click(function(e) {
            e.preventDefault();
            $(this).prop("disabled", true);
            $(this).html(
                `<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Updating...`
            );
            var serialized = $('ol.sortableLists').nestedSortable('serialize');
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
            var arrayjson = [{
                    href: "#",
                    icon: "fas fa-home",
                    text: "Home",
                    target: "_top",
                    title: "My Home",
                },
                {
                    icon: "fas fa-chart-bar",
                    text: "Opcion2"
                },
                {
                    icon: "fas fa-bell",
                    text: "Opcion3"
                },
                {
                    icon: "fas fa-crop",
                    text: "Opcion4"
                },
                {
                    icon: "fas fa-flask",
                    text: "Opcion5"
                },
                {
                    icon: "fas fa-map-marker",
                    text: "Opcion6"
                },
                {
                    icon: "fas fa-search",
                    text: "Opcion7",
                    children: [{
                        icon: "fas fa-plug",
                        text: "Opcion7-1",
                        children: [{
                            icon: "fas fa-filter",
                            text: "Opcion7-1-1"
                        }],
                    }, ],
                },
            ];
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
            editor.setForm($("#frmEdit"));
            editor.setUpdateButton($("#btnUpdate"));
            $("#btnReload").on("click", function() {
                editor.setData(arrayjson);
            });

            $("#btnOutput").on("click", function() {
                var str = editor.getString();
                $("#out").text(str);
            });

            $("#btnUpdate").click(function() {
                editor.update();
            });

            $("#btnAdd").click(function() {
                editor.add();
            });
            /* ====================================== */

            /** PAGE ELEMENTS **/
            $('[data-toggle="tooltip"]').tooltip();
            $.getJSON(
                "https://api.github.com/repos/davicotico/jQuery-Menu-Editor",
                function(data) {
                    $("#btnStars").html(data.stargazers_count);
                    $("#btnForks").html(data.forks_count);
                }
            );
        });
    </script>
@endpush
