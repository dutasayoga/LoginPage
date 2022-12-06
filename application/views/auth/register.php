<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title">Register</h5>
                        <p>Sign up your account below..</p>
                        <form action="<?= base_url('auth/register'); ?>" class="user" method="POST">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="name@rumahweb.co.id" name="email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">First Name</label>
                                    <input type="name" class="form-control" id="firstName" placeholder="first name.." name="firstName" value="<?= set_value('firstName'); ?>">
                                    <?= form_error('firstName', '<small class="text-danger pl-3">', '</small>'); ?>

                                </div>
                                <div class="col-md-6">
                                    <label for="inputLastName" class="form-label">Last name</label>
                                    <input type="name" class="form-control" id="lastName" placeholder="last name.." name="lastName" value="<?= set_value('lastName'); ?>">
                                    <?= form_error('lastName', '<small class="text-danger pl-3">', '</small>'); ?>

                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="password" name="password" value="<?= set_value('password'); ?>">
                                <span id="toogler" class="fa fa-fw fa-eye field_icon toggle-password"></span>
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>

                            </div>
                            <div class="mb-3">
                                <button class="btn btn" type="submit">Sign Up</button>
                            </div>
                        </form>


                        <div class="footer">
                            <p>Already have account? <a href="<?= base_url('auth'); ?>">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

    <script>
        $("#toogler").click(function(e) {
            e.preventDefault();
            var type = $("#password").attr("type");
            if (type == "password") {
                $("#password").attr("type", "text");
            } else if (type == "text") {
                $("#password").attr("type", "password");
            }
        });
    </script>
</body>

</html>