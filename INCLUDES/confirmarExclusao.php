<section>
    <a href="index.php">
        <button class="btn btn-success">Voltar</button>
    </a>

    <h2 class="mt-3">Excluir Notícia</h2>
    <form method="post">
        <div class="form-group">
            <p>Você deseja realmente excluir a Notícia
                <strong><?php echo $obNoticia->titulo; ?></strong>
            </p>
        </div>

        <div class="form-group">
            <a href="index.php">
                <button class="btn btn-secondary"><a href="index.php" style="text-decoration: none; color: white;">Cancelar</a></button>
            </a>
            <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
        </div>
    </form>

</section>