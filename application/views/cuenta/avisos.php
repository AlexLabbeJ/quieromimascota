        <?php if (count($avisos) > 0): ?>
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <td>
                            Titulo
                        </td>
                        <td>
                            Tipo de mascota
                        </td>
                        <td>
                            Fecha de publicacion
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($avisos as $item): ?>
                        <tr class="columna-clic" data-href="<?= base_url() ?>aviso/ver/<?= $item->id . '/' . $item->tipoaviso ?>">
                            <td><?= $item->titulo ?></td>
                            <td><?= $item->tipo_mascota ?></td>
                            <td><?= $item->fecha_publicacion ?></td>
                        </tr> 
                    <?php endforeach; ?>
                </tbody>
            </table>
            <ul class="pagination">
                <?= $links ?>
            </ul>
        <?php else: ?>
            <div>
                no hay avisos
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(".columna-clic").click(function () {
            window.location = $(this).data("href");
        });
    });
</script>
