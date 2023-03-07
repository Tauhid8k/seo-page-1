<?php

namespace App\Http\Livewire\Projects;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Projects extends Component
{
    use WithFileUploads;

    public $files = [];

    public function render()
    {
        $projects = Project::all();
        return view('livewire.projects.projects', [
            'projects' => $projects
        ]);
    }

    public function uploadFiles()
    {

        $generatedFolder = $this->slug . '-' . time();
        $fileUrls = [];

        Storage::disk('files')->makeDirectory($generatedFolder);
        foreach ($this->files as $file) {
            $generatedName = $file->hashName();
            $file->storeAs("files/$generatedFolder", $generatedName);
            $fileUrls[] = Storage::disk('files')->url("/$generatedFolder/$generatedName");
        }

        $this->files = ["$generatedFolder" => $fileUrls];

        // Delete livewire-temp files
        $this->cleanupTmpFiles();
    }

    public function submit()
    {
        $project = new Project();

        $this->uploadFiles();
        $project->files = $this->files;
    }

    // Cleanup Livewire Tmp Files
    private function cleanupTmpFiles()
    {
        $oldTempFiles = Storage::files('livewire-tmp');

        if ($oldTempFiles) {
            foreach ($oldTempFiles as $file) {
                Storage::delete($file);
            }
        }
    }
}
