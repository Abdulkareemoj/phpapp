<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events Page</title>
    <?php include './includes/scripts.php' ;?>
</head>

<body>


    <?php  include './includes/landing/header.php'?>
    <!-- Hero Section -->
    <section class="bg-dark text-light text-center py-5">
        <div class="container">
            <h1 class="display-4">Hunt Your Best Events</h1>
            <p class="lead">Embark on the Quest for the Ultimate Celebration!</p>
            <form class="d-flex justify-content-center mt-3">
                <input type="text" class="form-control w-50" placeholder="Search events...">
                <button class="btn btn-primary ms-2">Find Event</button>
            </form>
        </div>
    </section>

    <!-- Event Highlights -->
    <section class="container my-5">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">150+ Upcoming Events</h5>
                        <p class="card-text">View More Events</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Healthy Living</h5>
                        <p class="card-text">Free Ticket Event</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-dark">
                    <div class="card-body">
                        <h5 class="card-title">2024 Free Ticket Event</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center">Ticket Sales Update</h2>
            <div class="row text-center">
                <div class="col-md-4">
                    <h4>Ticket Sales</h4>
                    <div class="progress" style="height: 20px;">
                        <div class="progress-bar bg-primary" style="width: 80%;">80%</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4>Visitor Volume</h4>
                    <div class="progress" style="height: 20px;">
                        <div class="progress-bar bg-success" style="width: 65%;">65%</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Table -->
    <section class="container my-5">
        <h3 class="text-center">Record Of Successfully Executed Events</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title Event</th>
                    <th>Speaker</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tech Talk Symposium</td>
                    <td>Stevano Andre</td>
                    <td>12/01/2024</td>
                    <td><a href="#" class="btn btn-outline-primary btn-sm">Details</a></td>
                </tr>
                <tr>
                    <td>Global Innovation Summit</td>
                    <td>Henry Bafere</td>
                    <td>14/02/2024</td>
                    <td><a href="#" class="btn btn-outline-primary btn-sm">Details</a></td>
                </tr>
                <!-- More rows as needed -->
            </tbody>
        </table>
    </section>

    <!-- Testimonials Section -->
    <section class="bg-light py-5">
        <div class="container text-center">
            <h3>Upcoming Events</h3>
            <div class="row">
                <div class="col-md-3">
                    <img src="https://via.placeholder.com/150" class="rounded-circle mb-3" alt="Speaker 1">
                    <p>12/04/2024</p>
                </div>
                <div class="col-md-3">
                    <img src="https://via.placeholder.com/150" class="rounded-circle mb-3" alt="Speaker 2">
                    <p>23/04/2024</p>
                </div>
                <!-- Add more testimonials as needed -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <!-- <footer class="bg-dark text-light py-4">
        <div class="container text-center">
            <p class="mb-0">© 2024 Events</p>
            <p>Terms | Privacy | Contact</p>
        </div>
    </footer> -->
    <?php  include './includes/shared/footer.php'?>

</body>

</html>