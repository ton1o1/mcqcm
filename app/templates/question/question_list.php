<?php $this->layout('layout', ['title' => 'Liste des questions']) ?>

<?php $this->start('main_content') ?>
  <h2>Liste des questions</h2>
  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>Question</th>
        <th>Quiz</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td>Id</td>
        <td>Question</td>
        <td>Quiz</td>
      </tr>
    </tfoot>
    <tbody>
    <!-- 
      it will display the list just underneath
    -->
      <?= $rows ?>
    </tbody>
  </table>
  
  <p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>
<?php $this->stop('main_content') ?>
