<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container my-auto">
        <div class="row">
            <div class="col-md-8 mx-auto bg-light border mt-3">
                <div class="row">
                    <div class="border-bottom mt-2">
                        <h1 class="text-center text-info">PHP To Do List Project</h1>
                    </div>
                    <div class="col-md-10 mx-auto mt-4">
                        <form method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="New Task" name="task" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <input type="submit" value="Add" class="btn btn-outline-primary" name="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 border-bottom mt-2">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th colspan="1">#</th>
                                    <th colspan="3">Task</th>
                                    <th colspan="1">Status</th>
                                    <th colspan="1">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>