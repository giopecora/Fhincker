<div class="container">

    <h3>POTENCIAL REBELDE</h3>
    <table class="table">
      <thead>
        <tr>
          <th>Nome da Nave</th>
          <th>Qtde de Naves</th>
          <th>Potencial Sem os Planos</th>
          <th>Potencial Com os Planos</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Cruzador Estelar Mon Calamari</td>
          <td><?php echo$this->cruzador->qtd_naves; ?></td>
          <td><?php echo $this->cruzador->potencialSemPlano;?>%</td>
          <td><?php echo $this->cruzador->potencialComPlano;?>%</td>
        </tr>
        <tr>
          <td>Caça estelar B-wing</td>
          <td><?php echo$this->bwing->qtd_naves; ?></td>
          <td><?php echo $this->bwing->potencialSemPlano;?>%</td>
          <td><?php echo $this->bwing->potencialComPlano;?>%</td>
        </tr>
        <tr>
          <td>Caça estelar X-wing T-65</td>
          <td><?php echo$this->xwing->qtd_naves; ?></td>
          <td><?php echo $this->xwing->potencialSemPlano;?>%</td>
          <td><?php echo $this->xwing->potencialComPlano;?>%</td>
        </tr>
        <tr>
          <td>Sombra Furtiva</td>
          <td><?php echo$this->sombra->qtd_naves; ?></td>
          <td><?php echo $this->sombra->potencialSemPlano;?>%</td>
          <td><?php echo $this->sombra->potencialComPlano;?>%</td>
        </tr>
      </tbody>
    </table>
    </br>

    <h3>POTENCIAL IMPERIO</h3>
    <table class="table">
      <thead>
        <tr>
          <th>Nome da Nave</th>
          <th>Potencial(Média)</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Fragata classe Lancer</td>
          <td><?php echo $this->fragata;?>%</td>
        
        </tr>
        <tr>
          <td>Cruzador classe Gozanti</td>
          <td><?php echo $this->gozanti;?>%</td>
         
        </tr>
        <tr>
          <td>Transporte médio GR-75</td>
          <td><?php echo $this->tranpMedio->ship_potential;?>%</td>
          
        </tr>
        <tr>
          <td>Super Destróier Estelar</td>
          <td><?php echo $this->destroier->ship_potential;?>%</td>
          
        </tr>
      </tbody>
    </table>

</div>