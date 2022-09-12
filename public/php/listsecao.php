<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-5 mb-3 clearfix">
                    <h2 class="pull-left">Seções</h2>
                    <a href="createsecao.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Exportar Guia</a>
                    <a href="createsecao.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Adicionar nova seção</a>
                    <a href="index.php" class="btn btn-primary pull-right"><i class="fa fa-home"></i> Página Principal</a>
                </div>
                <?php
                // Include config file
                require_once "config.php";

                // Attempt select query execution
                $sql = "SELECT * FROM secao";
                if ($result = mysqli_query($link, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        echo '<table class="table table-bordered table-striped">';
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>id</th>";
                        echo "<th>Ordem</th>";
                        echo "<th>Nome</th>";
                        echo "<th>Opções</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['ordem'] . "</td>";
                            echo "<td>" . $row['nome'] . "</td>";
                            echo "<td>";
                            echo '<a href="readsecao.php?id=' . $row['id'] . '" class="mr-3" title="Explorar" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                            echo '<a href="updatesecao.php?id=' . $row['id'] . '" class="mr-3" title="Alterar" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                            echo '<a href="deletesecao.php?id=' . $row['id'] . '" title="Excluir" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        // Free result set
                        mysqli_free_result($result);
                    } else {
                        echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close connection
                mysqli_close($link);
                ?>
            </div>
        </div>
    </div>
    </div>
</body>

</html>