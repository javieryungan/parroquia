<?php
require_once './controladores/horarios.controlador.php';
$misas         = new horariosControlador();
$horario = $misas->CtrConsultarEventos(1);
?>
<!-- Panel listado de misas -->
<br>
<div class="container-fluid mt-3 ">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; CALENDARIO DE EVENTOS</h3>
        </div>
        <div class="panel-body">
            <div id='loading'>loading...</div>
            <div id='calendar'></div>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloEvento">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var initialLocaleCode = 'es';
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            initialDate: new Date(),
            locale: initialLocaleCode,
            navLinks: true, // can click day/week names to navigate views
            businessHours: true, // display business hours
            editable: true,
            selectable: true,
            /* events: [
                <?php
                foreach ($horario as $key => $value) {
                ?>,
                    {
                        title: '<?php echo $value['title'] ?>',
                    }
                <?php } ?>
                 <?php foreach ($horario as $key => $value) { ?> {
                        _id: '<?php echo $value['id_datosActividad'] ?>',
                        title: '<?php echo $value['title'] ?>',
                        start: '<?php echo $value['act_fechacelebracion'] ?>',
                        end: '<?php echo $value['act_fechacelebracion'] ?>'
                    }
                <?php } ?> 
            ], */
            events: [
                <?php
                 foreach ($horario as $key => $value) { ?> {
                        _id: '<?php echo $value['id_datosActividad']; ?>',
                        title: '<?php echo $value['descripcion']; ?>',
                        start: '<?php echo $value['inicio']; ?>',
                        end: '<?php echo $value['fin']; ?>',
                        color: '<?php echo $value['color']; ?>'
                    },
                <?php } ?>
            ],
            loading: function(bool) {
                document.getElementById('loading').style.display =
                    bool ? 'block' : 'none';
            },
            eventClick: function(info) {
                alert('Event: ' + info.event.title + info.event.view);
                // change the border color just for fun
                info.el.style.borderColor = 'red';
                info.el.style.backgroundColor = 'red';
                $(this).css('background-color', 'red');
                $("#tituloEvento").html(info.event.title);
                $("#exampleModal").modal();
            }

        });

        calendar.render();
    });
</script>