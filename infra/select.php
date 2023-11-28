<?php 
require_once "../base.php";
echo myHeader();
?>
<body>
    <div  style="display:flex;height:100vh;width:100vw;align-items:center;justify-content:center">
        <table class="table" style="margin: auto">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
            </tr>
            <tbody>
                <?php
                    if($_POST){
                        require_once "conexao.php";
                        $sql = "SELECT * FROM users";
                        $result = $conn->query($sql);
                        while($row = mysqli_fetch_assoc($result)){
                            echo <<<EOF
                                <tr>
                                    <td>{$row["nome"]}</td>
                                    <td>{$row["email"]}</td>
                                </tr>
                            EOF;
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    
</body>