using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(FinalAutoLibrary.Startup))]
namespace FinalAutoLibrary
{
    public partial class Startup
    {
        public void Configuration(IAppBuilder app)
        {
            ConfigureAuth(app);
            //Add Role managaer
            app.CreatePerOwinContext<ApplicationRoleManager>(ApplicationRoleManager.Create);
        }
    }
}
