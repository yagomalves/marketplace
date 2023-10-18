<?php
    include_once 'header.php';

    $selector = $_GET["selector"];
    $validator = $_GET["validator"];

    if(empty($selector) || empty($validator)) {
        die("Não pudemos validar seu pedido.");
    } else {

    if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
?>

        <form action="includes/createnewpassword.inc.php" method="post">
            <input type="hidden" name="selector" value="<?php echo $selector; ?>">
            <input type="hidden" name="validator" value="<?php echo $validator; ?>">
            <input type="password" name="pwd" placeholder="Digite sua nova senha">
            <input type="password" name="pwd-repeat" placeholder="Repita a nova senha">
            <button type="submit" name="reset-password-submit">Resetar senha</button>
        </form>

<?php } else { die("Solicitação inválida. Tente novamente."); }
    }