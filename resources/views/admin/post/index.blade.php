@extends('layouts.dashboardApp') @section('content')

<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Posts</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <span class="mdi mdi-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">Posts</li>
                    <li class="breadcrumb-item" aria-current="page">All</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Recent Order Table -->
                <div class="card card-table-border-none" id="recent-orders">
                    <div class="card-header justify-content-between">
                        <h2>Recent Posts</h2>
                        <div class="date-range-report">
                            <span>Sep 24, 2021 - Oct 23, 2021</span>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-5">
                        <table
                            class="
                                table
                                card-table
                                table-responsive table-responsive-large
                            "
                            style="width: 100%"
                        >
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Product Name</th>
                                    <th class="d-none d-md-table-cell">
                                        Units
                                    </th>
                                    <th class="d-none d-md-table-cell">
                                        Order Date
                                    </th>
                                    <th class="d-none d-md-table-cell">
                                        Order Cost
                                    </th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>24541</td>
                                    <td>
                                        <a class="text-dark" href="">
                                            Coach Swagger</a
                                        >
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        1 Unit
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        Oct 20, 2018
                                    </td>
                                    <td class="d-none d-md-table-cell">$230</td>
                                    <td>
                                        <span class="badge badge-success"
                                            >Completed</span
                                        >
                                    </td>
                                    <td class="text-right">
                                        <div
                                            class="
                                                dropdown
                                                show
                                                d-inline-block
                                                widget-dropdown
                                            "
                                        >
                                            <a
                                                class="
                                                    dropdown-toggle
                                                    icon-burger-mini
                                                "
                                                href=""
                                                role="button"
                                                id="dropdown-recent-order1"
                                                data-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                                data-display="static"
                                            ></a>
                                            <ul
                                                class="
                                                    dropdown-menu
                                                    dropdown-menu-right
                                                "
                                                aria-labelledby="dropdown-recent-order1"
                                            >
                                                <li class="dropdown-item">
                                                    <a href="#">Edit</a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a href="#">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
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

@endsection