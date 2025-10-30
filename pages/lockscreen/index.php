<?php
function redirect($page = 'null')
{
    // If no specific page is provided, try to get it from the URL parameters
    if ($page === null && isset($_GET['return_to'])) {
        $page = $_GET['return_to'];
    } else if ($page === null) {
        // Default fallback if no return_to parameter exists
        $page = 'dashboard';
    } 
    
    echo '<script>location.href="?page=' . 'index.php' . '"</script>';
}

if (empty($_SESSION["username"])) {
    $_SESSION = array();
  
    session_destroy();
  
    header("location: index.php");
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];

    if (empty($password)) {
        $error = 'Password is Required!';
    } else {
        include('C:/xampp/htdocs/arms/inc/lib/database.php');
        $dbConnection = new DB();

        $username = $_SESSION['username'];
        $statement = $dbConnection->con->prepare(
            "SELECT password FROM tbl_users WHERE username = ?"
        );

        $statement->bind_param("s", $username);
        $statement->execute();
        $statement->bind_result($stored_password);

        if ($statement->fetch()) {
            if (md5($password) === $stored_password) {
                $_SESSION['last_activity'] = time(); // Update session activity time
                redirect();
                exit;
            } else {
                $error = "Password Invalid!";
            }
        }

        $statement->close();
    }
}

// Store the current page in a hidden field to return to it after unlocking
$return_to = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>

<script>
    function $username() {
        location.replace("../index.php")
    }
</script>

<style>
    :root {
        --primary-color: #4361ee;
        --secondary-color: #3f37c9;
        --accent-color: #4895ef;
        --text-color: #2b2d42;
        --light-color: #f8f9fa;
        --error-color: #e63946;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    /* This is the main overlay that will blur the entire site content */
    .site-lockscreen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(43, 45, 66, 0.3);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .lockscreen-wrapper {
        background: white;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 420px;
        padding: 2.5rem;
        text-align: center;
        animation: fadeIn 0.5s ease;
        margin: auto;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .lockscreen-logo {
        margin-bottom: 1.5rem;
        font-size: 2rem;
        font-weight: 700;
    }

    .lockscreen-logo a {
        text-decoration: none;
        color: var(--primary-color);
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
    }

    .lockscreen-logo a:hover {
        color: var(--secondary-color);
    }

    .lockscreen-name {
        margin-bottom: 1.5rem;
        color: var(--text-color);
    }

    .lockscreen-name h6 {
        font-size: 1.2rem;
        margin: 0;
        font-weight: 500;
    }

    .lockscreen-item {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 2rem;
    }

    .lockscreen-image {
        flex-shrink: 0;
        margin-right: 1rem;
    }

    .lockscreen-image img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        object-position: center;
        border: 3px solid var(--primary-color);
        box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
    }

    .lockscreen-credentials {
        flex-grow: 1;
        max-width: 230px;
    }

    .input-group {
        display: flex;
        position: relative;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .form-control {
        flex-grow: 1;
        padding: 1rem;
        border: none;
        background: #f8f9fa;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        background: white;
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
    }

    .input-group-append button {
        background: var(--primary-color);
        border: none;
        color: white;
        padding: 0.75rem 1.25rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .input-group-append button:hover {
        background: var(--secondary-color);
    }

    .input-group-append i {
        color: white;
    }

    .text-danger {
        color: var(--error-color);
        font-size: 0.9rem;
        margin: 0.5rem 0;
    }

    .help-block {
        color: #6c757d;
        margin-bottom: 1rem;
        font-size: 0.9rem;
    }

    .text-center a {
        color: var(--accent-color);
        text-decoration: none;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .text-center a:hover {
        color: var(--primary-color);
        text-decoration: underline;
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }

    .info-icon {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        color: var(--accent-color);
        margin: 0 0.2rem;
        animation: pulse 2s infinite;
    }
</style>

<!-- This overlay sits on top of all website content and blurs it -->
<div class="site-lockscreen">
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <a href="#">
                <span>Lock</span>
                <span class="info-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    </svg>
                </span>
                <span>Screen</span>
            </a>
        </div>

        <div class="lockscreen-name">
            <h6><?php echo $_SESSION['fullname']; ?></h6>
        </div>

        <div class="lockscreen-item">
            <div class="lockscreen-image">
                <img src="../images/users_profile/<?php echo $_SESSION['image']; ?>" 
                    alt="User Profile" 
                    title="<?php echo $_SESSION['fullname']; ?>">
            </div>

            <form method="POST" class="lockscreen-credentials">
                <div class="input-group">
                    <input type="password" name="password" class="text-center" placeholder="Enter password" required>
                    <input type="hidden" name="return_to" value="<?php echo $return_to; ?>">
                    <div class="input-group-append">
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <?php if (!empty($error)): ?>
            <p class="text-danger">
                <?php echo $error; ?>
            </p>
        <?php endif; ?>

        <div class="help-block">
            Enter your password to resume your session
        </div>
        
        <div class="text-center">
            <a href="../index.php">Sign in with a different account</a>
        </div>
    </div>
</div>