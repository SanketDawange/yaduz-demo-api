@extends('layouts.base')

@section('content')
    <section id="minimal-statistics">
        <div class="row">
            <div class="col-12">
                <div class="content-header">Dashboard</div>

            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card cursor-pointer" onclick="window.location.href='/categories'">
                    <div class="card-content" style="height:150px;">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body text-left">
                                    <h3 class="mb-1 success">{{$categoryCount}}</h3>
                                    <span>Total Categories</span><br><br><br>
                                </div>
                                <div class="media-right align-self-center">
                                    <i class="ft-folder success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card cursor-pointer" onclick="window.location.href='/products'">
                    <div class="card-content" style="height:150px;">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body text-left">
                                    <h3 class="mb-1 warning">{{$productCount}}</h3>
                                    <span>Total Products</span><br><br>
                                </div>
                                <div class="media-right align-self-center">
                                    <i class="ft-box warning font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content" style="height:150px;">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body text-left">
                                    <h3 class="mb-1 primary">0</h3>
                                    <span>Today's Sales</span><br><br>
                                </div>
                                <div class="media-right align-self-center">
                                    <i class="ft-briefcase primary font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content" style="height:150px;">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body text-left">
                                    <h3 class="mb-1 success">0</h3>
                                    <span>Today's Orders</span><br><br>
                                </div>
                                <div class="media-right align-self-center">
                                    <i class="ft-briefcase success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content" style="height:150px;">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body text-left">
                                    <h3 class="mb-1 warning">233</h3>
                                    <span>Pending Orders</span><br><br>
                                </div>
                                <div class="media-right align-self-center">
                                    <i class="ft-alert-circle warning font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content" style="height:150px;">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body text-left">
                                    <h3 class="mb-1 primary">0</h3>
                                    <span>InProcess Orders</span><br><br>
                                </div>
                                <div class="media-right align-self-center">
                                    <i class="ft-trending-up primary font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content" style="height:150px;">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body text-left">
                                    <h3 class="mb-1 success">38</h3>
                                    <span>Completed Orders</span><br><br>
                                </div>
                                <div class="media-right align-self-center">
                                    <i class="ft-check-square success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <h4 class="card-title" style="padding-top:20px; padding-left:21px;">Best Selling Products(of
                        Aug)</h4>
                    <div class="card-content">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <h4 class="card-title" style="padding-top:20px; padding-left:25px;">Best Selling Products(Of All Time)</h4>
                    <div class="card-content">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Checks Slim Fit Shirt</td>
                                        <td>Clothing</td>
                                        <td>7</td>
                                    </tr>
                                    <tr>
                                        <td>Blue Ethnic Motifs Embroidered Flared Sleeves Kurti</td>
                                        <td>Ethinicwear</td>
                                        <td>6</td>
                                    </tr>
                                    <tr>
                                        <td>Checked Shirt with Patch Pocket</td>
                                        <td>Clothing</td>
                                        <td>4</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Revenue For Current Year (2023)</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div id="line-area2" class="height-400 lineArea2">
                                <canvas id="revenueChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
