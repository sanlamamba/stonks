<?php include "../components/head.php"; ?>

<?php
$fournisseurs = new Utilisateur();
$stocks = new Stock();
if (isset($_POST['token-fournisseur'])) {
    $fournisseur->updateUtilisateurFournisseur($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['adresse'], $_POST['telephone'], $_POST['id']);
    header("Location: fournisseurs.php");
}
if (isset($_GET['edit'])) {
    $stock = $stocks->getStockByID($_POST['id'])[0];
    var_dump($stock);
}
?>

<!-- SIDEBAR -->
<?php include_once "../components/sidebar.php"; ?>
<!-- End of Sidebar -->

<!-- Content -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php include_once "../components/topbar.php"; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container">
            <div class='row'>
                <div class='col-6'>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Ajouter Un stock</h1>
                    <p class="mb-4">
                        Veuillez remplir les champs pour ajouter un nouveau stock ou consulter la liste des
                        stocks en
                        <a href="stocks.php">
                            cliquant ici
                        </a>.
                    </p>
                    <div class='card shadow mb-4'>
                        <div class='card-header'>
                            <h6 class="m-0 font-weight-bold text-primary">
                                Formulaire d'ajout des stocks
                            </h6>
                        </div>

                        <div class='card-body'>

                            <form method="POST" class="user">
                                <div class="form-group">
                                    <input hidden type="text" class="form-control" id="token-client" name="token-client"
                                        placeholder="token-client">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <small class='d-flex m-0 text-muted'>
                                            <span>Nom du produit</span>
                                            <span class="text-danger ml-3">Requis</span>
                                        </small>

                                        <input type="text" class="form-control " placeholder="Le nom du produit"
                                            name='designation' required />
                                    </div>

                                </div>
                                <div class="form-group">
                                    <small class='d-flex m-0 text-muted'>
                                        <span>quantite du produit</span>
                                        <span class="text-danger ml-3">Requis</span>
                                    </small>

                                    <input type="number" placeholder='Quantite  du produit' min=1 class="form-control"
                                        name='quantite' required />
                                </div>
                                <small class='d-flex m-0 text-muted'>
                                    <span>prix du produit</span>
                                    <span class="text-danger ml-3">Requis</span>
                                </small>
                                <div class="input-group mb-3">


                                    <input type="number" class="form-control" placeholder="Prix Unitaire du produit"
                                        name='prix' />
                                    <span class=" input-group-text" id="basic-addon2">Fcfa</span>
                                </div>
                                <div class="form-group row">
                                    <p class='col-12 m-0 small'>Categorie du produit &nbsp;
                                        <span class='text-warning'> &nbsp; Facultatif</span>

                                    </p>
                                    <div class='col-7'>
                                        <select name='categorie' class='form-control'>
                                            <option default value='1'>
                                                Selectionner une categorie
                                            </option>
                                            <option default value='1'>
                                                Boisson
                                            </option>

                                        </select>
                                    </div>
                                    <div class='col-5'>
                                        <button class='btn btn-light border rounded btn-block'> Creer une
                                            categorie</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class='col-12 m-0 small'>Fournisseur du produit &nbsp;
                                        <span class='text-danger'> &nbsp; Requis</span>

                                    </p>
                                    <div class='col-7'>
                                        <select name='fournisseur' required class='form-control'>
                                            <option default value="">
                                                Selectionner un fournisseur
                                            </option>
                                            <?php
                                            foreach ($fournisseurs->getUtilisateurByType('fournisseur') as $fournisseur) {
                                            ?>
                                            <option default value=<?= $fournisseur['id'] ?>>
                                                <?= $fournisseur['nom'] ?>
                                                <?= $fournisseur['prenom'] ?>
                                            </option>
                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class='col-5'>
                                        <a href="nouveauFournisseurs.php"
                                            class='btn btn-light border rounded btn-block'> Nouveau
                                            Fournisseur</a>
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <small class='d-flex m-0 text-muted'>
                                            <span>Type du produit</span>
                                            <span class="text-danger ml-3">Requis</span>
                                        </small>
                                        <input type="text" class="form-control" placeholder="Type du produit"
                                            name='type'>
                                    </div>

                                </div>
                                <hr>

                                <input type="submit" class="btn btn-primary btn-block"
                                    value='Creer un nouveau produit' />

                                </a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Footer -->
    <?php include_once "../components/footer.php"; ?>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<?php include_once "../components/modals/backToTop.php"; ?>
<!-- Logout Modal-->
<?php include_once "../components/modals/logout.php"; ?>

<!-- JAVASCRIPT -->
<?php include_once "../components/end.php"; ?>

</body>

</html>