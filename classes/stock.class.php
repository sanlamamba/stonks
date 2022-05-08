<?php

class Stock extends Dbh
{

  //READ
  public function getStocks()
  {
    $sql = "SELECT * FROM stocks";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while ($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  public function getStockByID($id)
  {
    $sql = "SELECT * FROM stocks WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    // send result to a variable and return it
    $result = $stmt->fetch();
    return $result;
  }

  //BY CAtEGORIE
  // public function getUtilisateurByType($type)
  // {
  //   $sql = "SELECT * FROM utilisateurs WHERE type = ?";
  //   $stmt = $this->connect()->prepare($sql);
  //   $stmt->execute([$type]);

  //   while ($result = $stmt->fetchAll()) {
  //     return $result;
  //   };
  // }




  //END READ

  //CREATE

  public function addStock($designation, $quantite, $prix, $categorie_id, $type, $fournisseur_id)
  {
    echo "<script>alert('yes')</script>";
    $sql = "INSERT INTO `stocks` (`id`, `designation`, `quantite`, `prix`, `categorie_id`, `type`, `fournisseurs_id`) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$designation, $quantite, $prix, $categorie_id, $type, $fournisseur_id]);
  }

  //END CREATE

  // UPDATE
  public function updateStock($id, $designation, $quantite, $prix, $categorie_id, $type, $fournisseur_id)
  {
    $sql = "UPDATE `stocks` SET `designation` = ?, `quantite` = ?, `prix` = ?, `categorie_id` = ?, `type` = ?, `fournisseurs_id` = ? WHERE `stocks`.`id` = ?;";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$designation, $quantite, $prix, $categorie_id, $type, $fournisseur_id, $id]);
  }
  // update quantity of stock
  public function updateStockQuantite($quantite, $id)
  {
    $sql = "UPDATE `stocks` SET `quantite` = ? WHERE `stocks`.`id` = ?;";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$quantite, $id]);
  }



  //END UPDATE

  //DELETE

  public function delUtilisateur($id)
  {
    $sql = "DELETE FROM utilisateurs WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
  }

  //END DELETE
}