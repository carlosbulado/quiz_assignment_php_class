<?php include('../shared/header.php'); ?>
<?php 
$id = filter_input(INPUT_GET, 'id');
$userRep = new UserRepository();
$user = [];

if (!$_POST)
{
    $user = $userRep->getById($id);
}
else
{
    $action = filter_input(INPUT_POST, 'action');
    $id = filter_input(INPUT_POST, 'id');
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $isAdmin = 0;

    if ($action)
    {
        switch ($action)
        {
            case 'save':
            $userRep->save($id, $first_name, $last_name, $isAdmin, $username, $password);
            if(!$id) header('Location: ../home/home.php');
            break;
            default:
            $user = $userRep->getById($id);
            break;
        }
    }
}
?>
<main>
    <form method=post>
        <input type="hidden" name="id" value="<?php echo $user['id'] ?>" />

        <div>
            <label for="name">First Name:</label>
            <input name="first_name" id="first_name" type="text" placeholder="First Name" value="<?php echo $user['first_name'] ?>" />
        </div>
        <div>
            <label for="name">Last Name:</label>
            <input name="last_name" id="last_name" type="text" placeholder="Last Name" value="<?php echo $user['last_name'] ?>" />
        </div>
        <div>
            <label for="name">Username:</label>
            <input name="username" id="username" type="text" placeholder="Username" value="<?php echo $user['username'] ?>" />
        </div>
        <div>
            <label for="name">Password:</label>
            <input name="password" id="password" type="password" value="<?php echo $user['password'] ?>" />
        </div>

        <button type="submit" name="action" value="save"><?php echo ($id) ? 'Save' : 'Register' ?></button>
        <?php if($id) { ?>
            <button type="reset">Reset</button>
        <?php } ?>
    </form>
</main>

<script>
    var user = <?php echo json_encode($user); ?>;
</script>
<script>
    setTitle('<?php echo ($id) ? 'Edit User' : 'Register User' ?>'); 
</script>

<?php include('../shared/footer.php'); ?>