<table class="hs_datatable table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Location Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($row))
                    {
                        foreach($row as $r1)
                        {
                            ?>      
                     <tr>
                        <td>1</td>
                        <td>
                            <div class="hs_user">
                                <div class="user_name">
                                    <p><?= $r1->name; ?></p>
                                </div>
                            </div>
                        </td>
                       <td width="200">
                            <a href="http://doctor.kamleshyadav.net/admin/add_patient/2" class="btn" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a  class="btn" title="Delete" onclick="delete_user(2 ,2)"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                     </tr>
                     <?php
                        }
                    }
                    ?>
                </tbody>
            </table>