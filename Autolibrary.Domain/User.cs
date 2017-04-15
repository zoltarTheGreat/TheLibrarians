using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AutoLibrary.Domain
{
    public interface User
    {
       
        ICollection<Student> Students { get; set; }
        ICollection<Admin> Admins { get; set; }

    }
}
