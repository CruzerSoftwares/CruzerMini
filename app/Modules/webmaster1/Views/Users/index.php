<h2>List</h2>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php if( isset( $users ) && count($users)){
            foreach( $users as $user ){ ?>
        <tr>
            <td><?php __( $user['id']);?></td>
            <td><?php __( $user['name']);?></td>
            <td><?php __( $user['email']);?></td>
        </tr>
        <?php }
        } else{?>
        <tr>
            <td colspan="3">No Record found!</td>
        </tr>
        <?php }?>
    </tbody>
</table>