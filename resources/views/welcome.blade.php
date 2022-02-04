<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title>Linux command API</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Linux Commands Api is an api with more than 300 commands categorized by system functionality." name="description" />
        <meta content="chelitodelgado" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ secure_asset('favicon.jpg') }}">

        <!-- App css -->
        <link href="{{ secure_asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ secure_asset('/assets/css/app-modern.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7182633910611733"
            crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">

                        <div class="text-center">
                            <img src="favicon.jpg" height="140" alt="File not found Image">
                            <h3 class="mt-4">Linux Commands API</h3>
                            <p class="text-muted">Linux Commands Api is an api with more than 300 commands categorized by system functionality.</p>
                        </div>
                        <hr>
                        <br><br>
                    </div>
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-3 mb-2 mb-sm-0">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active show" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                        aria-selected="true">
                                        <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Introduction</span>
                                    </a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                        aria-selected="false">
                                        <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Categorys</span>
                                    </a>
                                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                        aria-selected="false">
                                        <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Commands</span>
                                    </a>
                                    <a class="nav-link" id="v-pills-pagination-tab" data-toggle="pill" href="#v-pills-pagination" role="tab" aria-controls="v-pills-pagination"
                                        aria-selected="false">
                                        <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Pagination</span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-sm-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <h4>Introduction</h4>
                                        <p>
                                            This documentation will help you become familiar with the Linux Commands API resources
                                            and will show you how to perform different queries, so that you can get the most out of it.
                                        </p>
                                        <h4>Base: <code>https://commandslinuxapi.herokuapp.com/api/{es|en}</code> </h4>
                                        <p>
                                            The base URL contains the documentation on all available API resources. All requests are GET
                                            requests and go through https. All responses will return data in json.
                                        </p>
                                        <p>
                                            You can change the language to Spanish and English where es = Spanish and en = English
                                        </p>
                                        <h4>Command schema</h4>
                                        <table class="table table-bordered table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Key</th>
                                                    <th>Type</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        id
                                                    </td>
                                                    <td>int</td>
                                                    <td>Id command or category</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        command
                                                    </td>
                                                    <td>String</td>
                                                    <td>Linux command</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        description
                                                    </td>
                                                    <td>String</td>
                                                    <td>Command description</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        category
                                                    </td>
                                                    <td>String</td>
                                                    <td>Command category</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                        <h4>Get all category</h4>
                                        <p>Show list of all available categories.</p>
                                        <p>
                                            You can change the language to Spanish and English where es = Spanish and en = English
                                        </p>
                                        <div class="card">
                                            <div class="card-header">
                                                <h4><strong>GET </strong> https://commandslinuxapi.herokuapp.com/api/{es|en}/categorys </h4>
                                                <h5><strong>Example: </strong> https://commandslinuxapi.herokuapp.com/api/en/categorys </h5>
                                            </div>
                                            <div class="card-body">
                                                   <img src="{{ asset('img/category.jpg') }}" class="img-fluid" alt="Schema categorys">
                                            </div>
                                        </div>
                                        <h4>Get a single category</h4>
                                        <p>Filter by category to search.</p>
                                        <div class="card">
                                            <div class="card-header">
                                                <h4><strong>GET </strong> https://commandslinuxapi.herokuapp.com/api/{es|en}/category/{category} </h4>
                                                <h5><strong>Example </strong> https://commandslinuxapi.herokuapp.com/api/en/category/system information </h5>
                                            </div>
                                            <div class="card-body">
                                                <img src="{{ asset('img/categoryuno.jpg') }}" class="img-fluid" alt="Schema category">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                        <h4>Get all commands</h4>
                                        <p>Show list of all available commands.</p>
                                        <p>
                                            You can change the language to Spanish and English where es = Spanish and en = English
                                        </p>
                                        <div class="card">
                                            <div class="card-header">
                                                <h4><strong>GET </strong> https://commandslinuxapi.herokuapp.com/api/{es|en}/commands </h4>
                                                <h5><strong>Example </strong> https://commandslinuxapi.herokuapp.com/api/es/commands </h5>
                                            </div>
                                            <div class="card-body">
                                                   <img src="{{ asset('img/comando.jpg') }}" class="img-fluid" alt="Schema comando">
                                            </div>
                                        </div>
                                        <h4>Filter commands</h4>
                                        <p>Filter by command to search.</p>
                                        <div class="card">
                                            <div class="card-header">
                                                <h4><strong>GET </strong> https://commandslinuxapi.herokuapp.com/api/{es|en}/command/{command} </h4>
                                                <h4><strong>Example </strong> https://commandslinuxapi.herokuapp.com/api/es/command/ls </h4>
                                            </div>
                                            <div class="card-body">
                                                   <img src="{{ asset('img/uncomando.jpg') }}" class="img-fluid" alt="Schema comando">
                                            </div>
                                        </div>
                                        <h4>Filter commands by category</h4>
                                        <p>Filter commands by category</p>
                                        <div class="card">
                                            <div class="card-header">
                                                <h4><strong>GET </strong> https://commandslinuxapi.herokuapp.com/api/{es|en}/commandsByCategory/{category} </h4>
                                                <h5><strong>Example </strong> https://commandslinuxapi.herokuapp.com/api/es/commandsByCategory/informacion del sistema </h5>
                                            </div>
                                            <div class="card-body">
                                                   <img src="{{ asset('img/bycategory.jpg') }}" class="img-fluid" alt="Schema command by category">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-pagination" role="tabpanel" aria-labelledby="v-pills-pagination-tab">
                                        <h4>Info and Pagination</h4>
                                        <p>The API will automatically paginate the responses. You will receive up to 20 documents per page.</p>
                                        <p>Each resource contains an info object with information about the response.</p>
                                        <p>
                                            You can change the language to Spanish and English where es = Spanish and en = English
                                        </p>
                                        <table class="table table-bordered table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Key</th>
                                                    <th>Type</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        current_page
                                                    </td>
                                                    <td>int</td>
                                                    <td>Current page numbery</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        last_page
                                                    </td>
                                                    <td>int</td>
                                                    <td>Last page number</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        last_page_url
                                                    </td>
                                                    <td>string (url)</td>
                                                    <td>Link to the last page</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        next_page_url
                                                    </td>
                                                    <td>string (url)</td>
                                                    <td>Link to the next page (if it exists)</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        prev_page_url
                                                    </td>
                                                    <td>string (url)</td>
                                                    <td>Link to the previous page (if it exists)
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="card">
                                            <div class="card-header">
                                                <h4><strong>GET </strong> https://commandslinuxapi.herokuapp.com/api/{es|en}/commands?page=2</h4>
                                            </div>
                                            <div class="card-body">
                                                <p>
                                                    You can access different pages with the page parameter. If you don't specify any page,
                                                    the first page will be shown. For example, in order to access page 2, add ?page=2 to the end of the URL.
                                                </p>
                                                <p>
                                                    You can change the language to Spanish and English where es = Spanish and en = English
                                                </p>
                                                   <img src="{{ asset('img/pagination.jpg') }}" class="img-fluid" alt="Schema comando">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>


        <footer class="footer footer-alt">
            2022 © Kharma Solutions - kharma-s.com
        </footer>

        <script src="{{ secure_asset('/assets/js/vendor.min.js') }}"></script>
        <script src="{{ secure_asset('/assets/js/app.min.js') }}"></script>
    </body>

</html>
