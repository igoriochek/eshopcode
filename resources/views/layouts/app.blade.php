<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Metas -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="verify-paysera" content="3ec543a10d4884d14bb56334d670650d">
    <!-- Title -->
    <title>
        @hasSection('title') 
            @yield('title') - {{ config('app.name', 'Consultus Magnus') }}
        @else 
            {{ config('app.name', 'Consultus Magnus') }} 
        @endif
    </title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/CM_logo.png') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/cookie-consent/css/cookie-consent.css') }}" rel="stylesheet" type="text/css">
    <!-- <link href="{{ asset('template/css/vendor/bootstrap.min.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('template/css/vendor/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/vendor/flaticon/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/vendor/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/vendor/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/vendor/sal.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/vendor/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/vendor/base.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.css" rel="stylesheet">
    @stack('css')
    @livewireStyles
</head>
<body class="sticky-header">
    @if (auth()->check() && auth()->user()->type == 1)
        <div class="admin-view">
            @include('layouts.components.admin_header')
            <main>
                @yield('content')
            </main>
        </div>
    @else
        @include('layouts.components.back_to_top')
        @include('layouts.components.header')
        <main class="main-wrapper">
            @include('layouts.components.page_banner')
            @yield('content')
        </main>
        @include('layouts.components.footer')
    @endif
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/js/vendor/modernizr.min.js') }}"></script>
    <!-- <script src="{{ asset('template/js/vendor/jquery.js') }}"></script> -->
    <script src="{{ asset('template/js/vendor/popper.min.js') }}"></script>
    <!-- <script src="{{ asset('template/js/vendor/bootstrap.min.js') }}"></script> -->
    <script src="{{ asset('template/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('template/js/vendor/js.cookie.js') }}"></script>
    <!-- <script src="template/js/vendor/jquery.style.switcher.js"></script> -->
    <script src="{{ asset('template/js/vendor/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ asset('template/js/vendor/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('template/js/vendor/sal.js') }}"></script>
    <script src="{{ asset('template/js/vendor/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('template/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('template/js/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('template/js/vendor/counterup.js') }}"></script>
    <script src="{{ asset('template/js/vendor/waypoints.min.js') }}"></script>
    <script src="{{ asset('template/js/main.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#categories').DataTable(
                {
                    "language":
                        {
                            "emptyTable": "No data available in table",
                            "info": "{{__("names.showing")}} _START_ {{__("names.to")}} _END_ {{__("names.of")}} _TOTAL_ {{__("names.entries")}}",
                            "infoEmpty": "{{__("names.showing")}}  0 {{__("names.to")}} 0 {{__("names.of")}} 0 {{__("names.entries")}}",
                            "infoFiltered": "(filtered from _MAX_ total entries)",
                            "infoThousands": ",",
                            "lengthMenu": "{{__("names.showing")}} _MENU_ {{__("names.entries")}}",
                            "loadingRecords": "Loading...",
                            "processing": "Processing...",
                            "search": "{{__("names.search")}}:",
                            "zeroRecords": "{{__("names.zeroRecords")}}:",
                            "thousands": ",",
                            "paginate": {
                                "first": "{{__("names.first")}}",
                                "previous": "&laquo;&nbsp;{{__("pagination.previous")}}",
                                "next": "{{__("pagination.next") }}&nbsp;&raquo;",
                                "last": "{{__("names.last")}}"
                            },
                            "aria": {
                                "sortAscending": ": activate to sort column ascending",
                                "sortDescending": ": activate to sort column descending"
                            },
                            "autoFill": {
                                "cancel": "Cancel",
                                "fill": "Fill all cells with <i>%d<\/i>",
                                "fillHorizontal": "Fill cells horizontally",
                                "fillVertical": "Fill cells vertically"
                            },
                            "buttons": {
                                "collection": "Collection <span class='ui-button-icon-primary ui-icon ui-icon-triangle-1-s'\/>",
                                "colvis": "Column Visibility",
                                "colvisRestore": "Restore visibility",
                                "copy": "Copy",
                                "copyKeys": "Press ctrl or u2318 + C to copy the table data to your system clipboard.<br><br>To cancel, click this message or press escape.",
                                "copySuccess": {
                                    "1": "Copied 1 row to clipboard",
                                    "_": "Copied %d rows to clipboard"
                                },
                                "copyTitle": "Copy to Clipboard",
                                "csv": "CSV",
                                "excel": "Excel",
                                "pageLength": {
                                    "-1": "Show all rows",
                                    "_": "Show %d rows"
                                },
                                "pdf": "PDF",
                                "print": "Print",
                                "updateState": "Update",
                                "stateRestore": "State %d",
                                "savedStates": "Saved States",
                                "renameState": "Rename",
                                "removeState": "Remove",
                                "removeAllStates": "Remove All States",
                                "createState": "Create State"
                            },
                            "searchBuilder": {
                                "add": "Add Condition",
                                "button": {
                                    "0": "Search Builder",
                                    "_": "Search Builder (%d)"
                                },
                                "clearAll": "Clear All",
                                "condition": "Condition",
                                "conditions": {
                                    "date": {
                                        "after": "After",
                                        "before": "Before",
                                        "between": "Between",
                                        "empty": "Empty",
                                        "equals": "Equals",
                                        "not": "Not",
                                        "notBetween": "Not Between",
                                        "notEmpty": "Not Empty"
                                    },
                                    "number": {
                                        "between": "Between",
                                        "empty": "Empty",
                                        "equals": "Equals",
                                        "gt": "Greater Than",
                                        "gte": "Greater Than Equal To",
                                        "lt": "Less Than",
                                        "lte": "Less Than Equal To",
                                        "not": "Not",
                                        "notBetween": "Not Between",
                                        "notEmpty": "Not Empty"
                                    },
                                    "string": {
                                        "contains": "Contains",
                                        "empty": "Empty",
                                        "endsWith": "Ends With",
                                        "equals": "Equals",
                                        "not": "Not",
                                        "notEmpty": "Not Empty",
                                        "startsWith": "Starts With",
                                        "notContains": "Does Not Contain",
                                        "notStarts": "Does Not Start With",
                                        "notEnds": "Does Not End With"
                                    },
                                    "array": {
                                        "without": "Without",
                                        "notEmpty": "Not Empty",
                                        "not": "Not",
                                        "contains": "Contains",
                                        "empty": "Empty",
                                        "equals": "Equals"
                                    }
                                },
                                "data": "Data",
                                "deleteTitle": "Delete filtering rule",
                                "leftTitle": "Outdent Criteria",
                                "logicAnd": "And",
                                "logicOr": "Or",
                                "rightTitle": "Indent Criteria",
                                "title": {
                                    "0": "Search Builder",
                                    "_": "Search Builder (%d)"
                                },
                                "value": "Value"
                            },
                            "searchPanes": {
                                "clearMessage": "Clear All",
                                "collapse": {
                                    "0": "SearchPanes",
                                    "_": "SearchPanes (%d)"
                                },
                                "count": "{total}",
                                "countFiltered": "{shown} ({total})",
                                "emptyPanes": "No SearchPanes",
                                "loadMessage": "Loading SearchPanes",
                                "title": "Filters Active - %d",
                                "showMessage": "Show All",
                                "collapseMessage": "Collapse All"
                            },
                            "select": {
                                "cells": {
                                    "1": "1 cell selected",
                                    "_": "%d cells selected"
                                },
                                "columns": {
                                    "1": "1 column selected",
                                    "_": "%d columns selected"
                                }
                            },
                            "datetime": {
                                "previous": "Previous",
                                "next": "Next",
                                "hours": "Hour",
                                "minutes": "Minute",
                                "seconds": "Second",
                                "unknown": "-",
                                "amPm": [
                                    "am",
                                    "pm"
                                ],
                                "weekdays": [
                                    "Sun",
                                    "Mon",
                                    "Tue",
                                    "Wed",
                                    "Thu",
                                    "Fri",
                                    "Sat"
                                ],
                                "months": [
                                    "January",
                                    "February",
                                    "March",
                                    "April",
                                    "May",
                                    "June",
                                    "July",
                                    "August",
                                    "September",
                                    "October",
                                    "November",
                                    "December"
                                ]
                            },
                            "editor": {
                                "close": "Close",
                                "create": {
                                    "button": "New",
                                    "title": "Create new entry",
                                    "submit": "Create"
                                },
                                "edit": {
                                    "button": "Edit",
                                    "title": "Edit Entry",
                                    "submit": "Update"
                                },
                                "remove": {
                                    "button": "Delete",
                                    "title": "Delete",
                                    "submit": "Delete",
                                    "confirm": {
                                        "_": "Are you sure you wish to delete %d rows?",
                                        "1": "Are you sure you wish to delete 1 row?"
                                    }
                                },
                                "error": {
                                    "system": "A system error has occurred (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">More information<\/a>)."
                                },
                                "multi": {
                                    "title": "Multiple Values",
                                    "info": "The selected items contain different values for this input. To edit and set all items for this input to the same value, click or tap here, otherwise they will retain their individual values.",
                                    "restore": "Undo Changes",
                                    "noMulti": "This input can be edited individually, but not part of a group. "
                                }
                            },
                            "stateRestore": {
                                "renameTitle": "Rename State",
                                "renameLabel": "New Name for %s:",
                                "renameButton": "Rename",
                                "removeTitle": "Remove State",
                                "removeSubmit": "Remove",
                                "removeJoiner": " and ",
                                "removeError": "Failed to remove state.",
                                "removeConfirm": "Are you sure you want to remove %s?",
                                "emptyStates": "No saved states",
                                "emptyError": "Name cannot be empty.",
                                "duplicateError": "A state with this name already exists.",
                                "creationModal": {
                                    "toggleLabel": "Includes:",
                                    "title": "Create New State",
                                    "select": "Select",
                                    "searchBuilder": "SearchBuilder",
                                    "search": "Search",
                                    "scroller": "Scroll Position",
                                    "paging": "Paging",
                                    "order": "Sorting",
                                    "name": "Name:",
                                    "columns": {
                                        "visible": "Column Visibility",
                                        "search": "Column Search"
                                    },
                                    "button": "Create"
                                }
                            }
                        }
                }
            );
        });

        $(function () {
            $("#start").datepicker();
        });

        $(function () {
            $("#finish").datepicker();
        });
    </script>
    @stack('scripts')
    @livewireScripts
</body>
</html>
