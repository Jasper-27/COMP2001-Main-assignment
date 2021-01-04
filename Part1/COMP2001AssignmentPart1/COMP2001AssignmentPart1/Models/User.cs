using System;
using System.Collections.Generic;
using System.Text.Json.Serialization; 

#nullable disable

namespace COMP2001AssignmentPart1.Models
{
    public partial class User
    {
        public int UserId { get; set; }
        public string Firstname { get; set; }
        public string Lastname { get; set; }
        public string Email { get; set; }
        [JsonIgnore]
        public string Password { get; set; }
        
    }
}
