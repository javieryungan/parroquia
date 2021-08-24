  <!-- Content page -->
  <div class="container-fluid">
    <div class="page-header">
      <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Solicitud <small>AGENDA</small></h1>
    </div>
  
  </div>


  <!-- Panel nuevo administrador <--></-->
  <div class="container-fluid">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; AGENDA</h3>
      </div>
      <div class="panel-body">
        <form>
          <fieldset>


            <div class="card-header">
              <h3 class="card-title">Compose New Message</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="form-group">
                <input class="form-control" placeholder="To:">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Subject:">
              </div>
              <div class="form-group">
                <label>Seleccione </label>
                <select class="form-control">
                  <option>Misa privada</option>
                  <option>Visita a enfermos</option>

                </select>
              </div>
              <div class="form-group">
                <textarea id="compose-textarea" class="form-control" style="height: 300px">
                  <h1><u>Heading Of Message</u></h1>
                  <h4>Subheading</h4>
                  <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain
                    was born and I will give you a complete account of the system, and expound the actual teachings
                    of the great explorer of the truth, the master-builder of human happiness. No one rejects,
                    dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know
                    how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again
                    is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain,
                    but because occasionally circumstances occur in which toil and pain can procure him some great
                    pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise,
                    except to obtain some advantage from it? But who has any right to find fault with a man who
                    chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that
                    produces no resultant pleasure? On the other hand, we denounce with righteous indignation and
                    dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so
                  blinded by desire, that they cannot foresee</p>
                  <ul>
                    <li>List item one</li>
                    <li>List item two</li>
                    <li>List item three</li>
                    <li>List item four</li>
                  </ul>
                  <p>Thank you,</p>
                  <p>John Doe</p>
                </textarea>
              </div>
             
                <div class="col-xs-12">
                  <div class="form-group">
                    <span class="control-label">Seleccionar archivos adjuntos</span>
                  <input type="file" name="pdf-reg" accept=".pdf">
                  <div class="input-group">
                    <input type="text" readonly="" class="form-control" placeholder="Elija el PDF...">
                    <span class="input-group-btn input-group-sm">
                      <button type="button" class="btn btn-fab btn-fab-mini">
                        <i class="zmdi zmdi-attachment-alt"></i>
                      </button>
                    </span>
                  </div>
                  <span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos: documentos PDF</small></span>
                </div>
                <br>
            <br>
            <br>
                </div>

            

            </div>
            <!-- /.card-body -->

            <center>
            <div class="card-footer">
              <div class="float-right">

                <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Enviar</button>
               
                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Cancelar</button>
              
              </div>
              
            </div>
            <!-- /.card-footer -->
       </center>
    
 


           
          </fieldset>
          <br>
          
          <br>
        
        </form>
      </div>
    </div>
  </div> 