#tool nuget:?package=Wyam&prerelease
#addin nuget:?package=Cake.Wyam&prerelease

//////////////////////////////////////////////////////////////////////
// ARGUMENTS
//////////////////////////////////////////////////////////////////////

var target = Argument("target", "Default");

//////////////////////////////////////////////////////////////////////
// PREPARATION
//////////////////////////////////////////////////////////////////////

var isLocal = BuildSystem.IsLocalBuild;
var isRunningOnUnix = IsRunningOnUnix();
var isRunningOnWindows = IsRunningOnWindows();
var isRunningOnAppVeyor = AppVeyor.IsRunningOnAppVeyor;
var isPullRequest = AppVeyor.Environment.PullRequest.IsPullRequest;

//////////////////////////////////////////////////////////////////////
// TASKS
//////////////////////////////////////////////////////////////////////

Task("Build")
    .Does(() =>
    {
        Wyam(new WyamSettings
        {
            InputPaths = new[] { new DirectoryPath("../input") },
            OutputPath = new DirectoryPath("../output")
        });
    });
    
Task("Preview")
    .Does(() =>
    {
        Wyam(new WyamSettings
        {
            InputPaths = new[] { new DirectoryPath("../input") },
            OutputPath = new DirectoryPath("../output"),
            Preview = true,
            Watch = true
        });        
    });
    
//////////////////////////////////////////////////////////////////////
// TASK TARGETS
//////////////////////////////////////////////////////////////////////

Task("Default")
    .IsDependentOn("Preview");
    
Task("AppVeyor")
    .IsDependentOn("Build");

//////////////////////////////////////////////////////////////////////
// EXECUTION
//////////////////////////////////////////////////////////////////////

RunTarget(target);
