
<link href="../../css/admin/user.css" rel="stylesheet" />
<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-uppercase mb-0">Manage Users</h5>
                </div>
                <div class="table-responsive">
                    <table class="table no-wrap user-table mb-0">
                    <thead>
                        <tr>
                        <th scope="col" class="border-0 text-uppercase font-medium pl-4">#</th>
                        <th scope="col" class="border-0 text-uppercase font-medium">Name</th>
                        <th scope="col" class="border-0 text-uppercase font-medium">Address</th>
                        <th scope="col" class="border-0 text-uppercase font-medium">contact</th>
                        <th scope="col" class="border-0 text-uppercase font-medium">CreatedAt</th>
                        <th scope="col" class="border-0 text-uppercase font-medium">UpdateAt</th>
                        <th scope="col" class="border-0 text-uppercase font-medium">Category</th>
                        <th scope="col" class="border-0 text-uppercase font-medium">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('conndb.php');
                            $sql = "select * from users";
                            $results = mysqli_query($conn,$sql);
                            $i = 1;
                            if(mysqli_num_rows($results))
                                while($user = mysqli_fetch_assoc($results)){
                                    echo '
                                        <tr>
                                        <td class="pl-4">'.$i++.'</td>
                                        <td>
                                            <h5 class="font-medium mb-0"><a href="/profile?user='.$user['username'].'" class="profile-link">'.$user['username'].'</a></h5>
                                            <!-- <span class="text-muted">address</span> -->
                                        </td>
                                        <td>
                                            <span class="text-muted">'.$user['address'].'</span><br>
                                        </td>
                                        <td>
                                            <span class="text-muted">'.$user['username'].'@gmail.com</span><br>
                                            <span class="text-muted">'.$user['phone'].'</span>
                                        </td>
                                        <td>
                                            <span class="text-muted">'.$user['createdAt'].'</span><br>
                                        </td>
                                        <td>
                                            <span class="text-muted">'.$user['updateAt'].'</span><br>
                                        </td>                                    
                                        <td>
                                            <select class="form-control category-select" id="exampleFormControlSelect1">
                                            <option>User</option>
                                            <option>Admin</option>
                                            </select>
                                        </td>
                                        
                                            <td>
                                                    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><a href="/profile?user='.$user['username'].'&delete=1"><i class="fa fa-trash"></i></a></button>
                                                    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><a href="/profile?user='.$user['username'].'&edit=1"><i class="fa fa-edit"></i> </a></button>
                                            </td>
                                        
                                        </tr>
                                    ';
                                }
                        ?>

                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>