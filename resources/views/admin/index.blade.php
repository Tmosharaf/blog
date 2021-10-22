@extends('layouts.dashboardApp') @section('content')

<div class="content-wrapper">
    <div class="content">
        <!-- Top Statistics -->
        <div class="row">
            <div class="col-12">
                <!-- Recent Order Table -->
                <div class="card card-table-border-none" id="recent-orders">
                    <div class="card-header justify-content-between">
                        <h2>Recent Posts</h2>
                        <div class="date-range-report">
                            <span></span>
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
                                    <th>Id</th>
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
                                                    <a href="#">View</a>
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
