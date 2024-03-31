<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css');

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
    <?php
    $total = 0;
    $sales = 0;
    $inprogress = 0;
    ?>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div>
                    @foreach ($odrs as $item)
                        <?php
                        $total = $total + $item->price;
                        $sales++;
                        if ($item->status == 'In Progress') {
                            $inprogress++;
                        }
                        ?>
                    @endforeach
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header">Income</div>
                        <div class="card-body">
                            <h1 class="card-title">
                                <center style="font-size: 35px">Rs. {{ $total }}</center>
                            </h1>
                            <p class="card-text"></p>
                        </div>
                    </div>

                    <div class="card text-white bg-success  mb-3" style="max-width: 18rem;">
                        <div class="card-header">Sales</div>
                        <div class="card-body">
                            <h1 class="card-title">
                                <center style="font-size: 35px">{{ $sales }}</center>
                            </h1>
                            <p class="card-text"></p>
                        </div>
                    </div>
                    <div class="card text-white bg-danger   mb-3" style="max-width: 18rem;">
                        <div class="card-header">In Progress</div>
                        <div class="card-body">
                            <h1 class="card-title">
                                <center style="font-size: 35px">{{ $inprogress }}</center>
                            </h1>
                            <p class="card-text"></p>
                        </div>
                    </div>

                    
                </div>

            </div>
        </div>

        <!-- container-scroller -->
        @include('admin.js');
</body>

</html>
