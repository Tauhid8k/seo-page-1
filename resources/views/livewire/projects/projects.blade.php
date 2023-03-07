<div>
  <div class="container">
    <!-- Project Status Container -->
    <div class="project-status-container">
      <!-- Status Heading -->
      <div class="project-status-heading">
        <h3 class="project-status">
          <span class="status-icon status-incomplete"></span>
          <span>Incomplete</span>
        </h3>
        <span class="project-counts">{{ count($projects) }}</span>
      </div>

      <!-- Project Container -->
      <div class="project-card-container">
        <!-- Project Card -->
        @foreach ($projects as $project)
        <div class="project-card">
          <!-- Client Info -->
          <div class="client-name">
            <img src="https://i.pravatar.cc/24?img=3" alt="" />
            <span>{{ $project->client_name }}</span>
          </div>
          <!-- Project Description -->
          <div class="project-info">
            <div class="project-details">
              <i class="fa-solid fa-layer-group"></i>
              <p>{{ $project->description }}</p>
            </div>
            <div class="project-task-counts">
              <i class="fa-solid fa-clipboard-list"></i>
              <span>1/2</span>
            </div>
          </div>
          <!-- Project Footer -->
          <div class="project-footer">
            <div class="member-avatars">
              <img src="https://i.pravatar.cc/24?img=7" alt="" />
              <img src="https://i.pravatar.cc/24?img=8" alt="" />
              <span class="other-members">12+</span>
            </div>
            <div class="member-comments">
              <i class="fa-regular fa-comments"></i>
              <span>200</span>
            </div>
            <div class="file-attachments" data-bs-toggle="modal" data-bs-target="#fileModal">
              <i class="fa-solid fa-paperclip"></i>
              <span>3</span>
            </div>
            <div class="project-date">
              <i class="fa-regular fa-calendar-days"></i>
              <span>20/22/22</span>
            </div>
          </div>
        </div>
        @endforeach
        <!-- Project Card End -->
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="fileModal" tabindex="-1" aria-labelledby="fileModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Files</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form wire:submit.prevent="submit" enctype="multipart/form-data">
            @csrf
            <x-form-group label="Add Files (Up to 10)">
              <x-file-pond wire:model="files" class="xs:w-80" multiple max-files="10" max-file-size="10MB" required>
                <x-slot name="plugins">
                  FilePond.registerPlugin(
                  FilePondPluginFileValidateSize,
                  );
                </x-slot>
              </x-file-pond>
              @error('files')
              <x-form-error name="files" />
              @enderror
            </x-form-group>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" wire:click.prevent="submit" class="btn btn-primary">Add Files</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>