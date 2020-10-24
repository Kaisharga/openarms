using System;
using System.Linq;
using System.Net;
using System.Net.Sockets;

namespace WhatIsMyLanIp
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.Title = "Open Arms IP Address";

            while(true)
            {
                var hostName = Dns.GetHostName();
                Console.WriteLine($"Computer Name: {hostName}");
                IPHostEntry ipEntry = Dns.GetHostEntry(hostName);
                var addresses = ipEntry.AddressList.Where(al => al.AddressFamily == AddressFamily.InterNetwork);

                Console.WriteLine($"Type this IP address into the browser address bar: {addresses.FirstOrDefault()}");
                Console.Read();
                Console.Read();
            }
        }
    }
}
