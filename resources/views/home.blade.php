@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                    </div>
                    <style>

                    </style>
                    <script>
                        $(document).ready(function () {
                            $('[data-toggle="tooltip"]').tooltip();
                            var actions = $("table td:last-child").html();
                            // Append table with add row form on add new button click
                            $(".add-new").click(function () {
                                $(this).attr("disabled", "disabled");
                                var index = $("table tbody tr:last-child").index();
                                var row = '<tr>' +
                                    '<td><input type="text" class="form-control" name="name" id="name"></td>' +
                                    '<td><input type="text" class="form-control" name="department" id="department"></td>' +
                                    '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
                                    '<td>' + actions + '</td>' +
                                    '</tr>';
                                $("table").append(row);
                                $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
                                $('[data-toggle="tooltip"]').tooltip();
                            });
                            // Add row on add button click
                            $(document).on("click", ".add", function () {
                                var empty = false;
                                var input = $(this).parents("tr").find('input[type="text"]');
                                input.each(function () {
                                    if (!$(this).val()) {
                                        $(this).addClass("error");
                                        empty = true;
                                    } else {
                                        $(this).removeClass("error");
                                    }
                                });
                                $(this).parents("tr").find(".error").first().focus();
                                if (!empty) {
                                    input.each(function () {
                                        $(this).parent("td").html($(this).val());
                                    });
                                    $(this).parents("tr").find(".add, .edit").toggle();
                                    $(".add-new").removeAttr("disabled");
                                }
                            });
                            // Edit row on edit button click
                            $(document).on("click", ".edit", function () {
                                $(this).parents("tr").find("td:not(:last-child)").each(function () {
                                    $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
                                });
                                $(this).parents("tr").find(".add, .edit").toggle();
                                $(".add-new").attr("disabled", "disabled");
                            });
                            // Delete row on delete button click
                            $(document).on("click", ".delete", function () {
                                $(this).parents("tr").remove();
                                $(".add-new").removeAttr("disabled");
                            });
                        });
                    </script>
                    <div class="container-lg">
                        <div class="table-responsive">
                            <div class="table-wrapper">
                                <div class="table-title">
                                    <div class="row">
                                        <div class="col-sm-8"><h2>Overzicht</h2></div>
                                        <div class="col-sm-4">
                                            <button type="button" class="btn btn-info add-new"><i
                                                    class="fa fa-plus"></i> Add New
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Naam</th>
                                        <th>Activiteit</th>
                                        <th>Instituut</th>
                                        <th>Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Administration</td>
                                        <td>(171) 555-2222</td>
                                        <td>

                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="" class="btn btn-warning" type="button">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                         class="bi bi-pencil"
                                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                                    </svg>

                                                </a>
                                            </div>
                                            <form action="" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="btn btn-danger  show_confirm"
                                                        data-toggle="tooltip" title='Delete'>
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                         class="bi bi-x-circle-fill"
                                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
