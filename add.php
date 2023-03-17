<?php
// Connect to the database
$dbhost = '192.168.1.100:3307';
$dbuser = "username";
$dbpass = "password";
$dbname = "database";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check for connection errors
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// If the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the title and text inputs
  $title = $_POST["title"];
  $text = $_POST["text"];

  // Insert the data into the database
  $sql = "INSERT INTO items (title, text) VALUES ('$title', '$text')";
  mysqli_query($conn, $sql);
}

// If the search query has been submitted
if (isset($_GET["q"])) {
  // Get the search query
  $q = $_GET["q"];

  // Search the database for items that match the query
  $sql = "SELECT * FROM items WHERE title LIKE '%$q%' OR text LIKE '%$q%'";
  $result = mysqli_query($conn, $sql);

  // Print the search results as a list
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<li><h3>" . $row["title"] . "</h3><p>" . $row["text"] . "</p></li>";
  }
}

// Close the database connection
mysqli_close($conn);
?>
<!--
<input type="text" id="search-input" placeholder="paste them here....." class="design1">
<ul id="list" class="hidden"><li>hello worlds</li></ul>
<script type="text/javascript">
  const searchInput = document.getElementById('search-input');
  const list = document.getElementById('list');
  const items = list.getElementsByTagName('li');

 searchInput.addEventListener('input', function() {
  const searchTerm = this.value.toLowerCase();

  if (searchTerm === '') {
    list.classList.add('hidden');
    return;
  }

  list.classList.remove('hidden');

  for (let i = 0; i < items.length; i++) {
    const item = items[i];
    const text = item.innerText.toLowerCase();

    if (text.indexOf(searchTerm) > -1) {
      item.innerHTML = text.replace(new RegExp(searchTerm, 'gi'), match => `<span class="highlight">${match}</span>`);
      item.style.display = 'block';
    } else {
      item.style.display = 'none';
    }
  }
}); 
</script>-->
<!--<li>float x = 2.0D; Which of the following is not a valid variable declaration in Java?</li>
<li>if (x Which statement will check if x is less than y?</li>
<li>There will be a syntax error after compilation. "What will happen if we compile the statement below? ~System.out.println(“Hello World!”)"</li>
<li>None of the above What will be the value of x after you execute this statement</li>
<li>Platform independent  The Java feature, "write once, run anywhere", is termed as</li>
<li>No, We can only write codes in Notepad  Can we directly compile codes from notepad?</li>
<li>1995  When was the officially released of Java?</li>
<li>none of the choices Which of the following is not a valid Float value?</li>
<li>print "Hello World" infinitely  What will be the output if you execute this code?</li>
<li>display 1111  what will be the output if you execute this code?</li>
<li>print "Hello World" What will be the output if you execute this code? do{System.out.println("Hello World!");}while(true);</li>
<li>765321  What is the output of the code snippet below:</li>
<li>0 What is the output of the code snippet below:</li>
<li>1 What is the return value of this method: ?</li>
<li>111111  What is the output of the code snippet below:</li>
<li>void  What is the return value of this method: public void sum(){} ?</li>
<li>int What is the return type of this method: ?</li>
<li>test  What is the name of this method: ?</li>
<li>All of the choices, none of the choices Which of the following shows a valid Overloading method?</li>
<li>int 25  What will be the value of if we execute this: ?</li>
<li>super() Which of the following is the correct way to call the constructor of the parent class?</li>
<li>All of the statements are correct Which of the following is true about Interface?</li>
<li>None of the Choice  What will be the value of x after you execute this statement</li>
<li>It will produce an exception. What will be the output if you execute this code:</li>
<li>5 What is the maximum index of the array:</li>
<li>All of the choices  Which of the following is a valid editor for java source code?</li>
<li>All of the above. Which of the following is true about syntax errors:</li>
<li>All of the choice Which of the following is a valid multidimensional array?</li>
<li>All of the choices  Which of the following scenarios where an exception may occur?</li>
<li>3 From the array int[] intArray = { 1, 2, 3, 5, 6, 7 };, what is the value of intArray[2]?</li>
<li>All of the choices  What is floating-point literal?</li>
<li>TRUE  What is the result if we execute this: ?</li>
<li>Oak What was the initial name of the Java programming language?</li>
<li>Runtime errors occur during run-time. Which of the following is true about Runtime errors</li>
<li>All of the choices  Which of the following is true about constructor?</li>
<li>this  It is used to access the instance variables shadowed by the parameters.</li>
<li>display 111 what will be the output if you execute this code?</li>
<li>all of the choices  Which of the following is not a valid Float value?</li>
<li>package ; Which of the following is the correct syntax to define a method?</li>
<li>int num = scan.nextInt(); Which of the following is a valid statement to accept int input? Let us assume that we have declared scan as Scanner.</li>
<li>5 From the array int[] intArray = { 1, 2, 3, 5, 6, 7 };, what is the value of intArray[3]?</li>
<li>stringArray[5]; Which of the following correctly accesses the sixth element stored in an array of 10 elements?</li>
<li>0 What is the output of the code snippet below:</li>
<li>765321  What is the output of the code snippet below:</li>
<li>All of these  Which of the following is a valid multidimensional array?</li>
<li>All of these  Which of the following declares an array of int named intArray?</li>
<li>5 What is the maximum index of the array: int[] intArray = { 1, 2, 3, 5, 6, 7 };</li>
<li>6 What is the length of the array: int[] intArray = { 1, 2, 3, 5, 6, 7 };</li>
<li>29  What is the index number of the last element of an array with 30 elements?</li>
<li>All of the choices  Which of the following is a valid multidimensional array?</li>
<li>All of the choices  Which of the following declares an array of int named intArray?</li>
<li>11  What is the output of the code snippet below: void main(){test();test();} void test(){System.out.print(“1”);}</li>
<li>compute Which of the following is a valid method name:</li>
<li>void test(int x){} void test(double x){}  Which of the following shows Overloading method?</li>
<li>int What is the return type of this method: ?</li>
<li>1 What is the return value of this method: ?</li>
<li>test  What is the name of this method: ?</li>
<li>1.01  What is the output of the code snippet below:</li>
<li>void  What is the return value of this method: public void sum(){} ?</li>
<li>111111  What is the output of the code snippet below:</li>
<li>All of the choices, none of the choices Which of the following shows a valid Overloading method?</li>
<li>None of these Which of the following shows a valid Overloading method?</li>
<li>IEEE  Which organization develops the 802 family of standard for wired and wireless LANs and MANs?</li>
<li>They vary depending on protocols  Which statement describes a characteristic of the frame header fields of the data link layer?</li>
<li>IEEE  Which organization develops the 802 family of standard for wired and wireless LANs and MANs?</li>
<li>providing the rules required for a specific type of communication to occur  What is the purpose of protocols in data communications?</li>
<li>All devices stop transmitting and try again later.  What happens when a data collision occurs on an bus?</li>
<li>The FTP client responds to the server with a smaller window size in the TCP header. A client is downloading a large file from a server using FTP. Many of the segments are lost during transit. What will most likely happen?</li>
<li>it can rapidly adapt to the failure of network devices and communication links, Data packets can travel through the network using multiple different paths, Network devices dynamically decide on the best available path to forward each packet. For which three reasons was a packet switched connectionless data communications technology used when developing the Internet (Choose three.)</li>
<li>TCP, UDP  Which of the following TCP/IP exist at the of the TCP/IP reference model? (Choose two.)</li>
<li>local router  Which device acts as gateway to allow hosts to send traffic to remote IP networks?</li>
<li>The host portion of the IP addresses will be different  What happens when two devices on the same subnet are communicating?</li>
<li>The Telecommunications Industry Association (TIA) Which organization is responsible for developing communications standards for Voice over IP (VoIP) devices?</li>
<li>to test if the workstation can communicate on the network A user who is unable to connect to the file server contacts the help desk. The helpdesk technician asks the user to ping the IP address of the default gateway that is configured on the workstation. What is the purpose for this command?</li>
<li>the privileged executive mode password  What is encrypted with the enable secret command?</li>
<li>to identify which protocol is being used  Which is a function of the Logical Link Control (LLC) sublayer?</li>
<li>destination IP address  Which logical address is used for delivery of data to a remote network?</li>
<li>Network access protocol What type of protocol describes communication over a data link and the physical transmission of data on the network media?</li>
<li>to add a password to a Cisco network device Why would a network administrator use the CLI of the Cisco IOS?</li>
<li>providing a richer e-learning environment, providing better social media opportunities  What are two benefits of collaboration and video-on-demand applications? (Choose two.)</li>
<li>to establish the media link What is the purpose of the physical link control field in a data link layer header?</li>
<li>router  Which device performs the function of determining the path that messages should take through internet works?</li>
<li>Tab "To save time, IOS commands may be partially entered and then completed by typing which key or key combination?"</li>
<li>"- A link-local IPv6 address is automatically"  "Which statement is true about an interface that is configured with the IPv6 address command?"</li>
<li>"(config) # service password-encryption"  "What command will prevent all unencrypted passwords from displaying in plain text in a configuration file?"</li>
<li>"The client sends a synchronization segment to begin the session" "Which action is performed by a client when establishing communication with a server via the use of UDP at the ?"</li>
<li>Command "What is initially entered at the CLI of the Cisco IOS when typing a command sequence?"</li>
<li>user EXEC mode  A router has a valid operating system and a configuration file stored in NVRAM. The configuration file contains an enable secret password but no console password. When the router boots up, which mode will display?</li>
<li>UDP reassembles that data in the order it was received and passes it to the application.  What does UDP do when receiving messages that are more than one datagram in length?</li>
<li>"To notify the workstation, that another router on the same network, is the better default-gateway to reach the remote server"  "A network administrator notices that the default gateway devices sends an ICMP Redirect message to the workstation when the workstation tries to connect to file server on another network. What is the purpose for this ICMP message?"</li>
<li>"They define how messages are exchanged between the sources and the destination"  "Which statement is correct about network ?"</li>
<li>International Telecommunication Union (ITU) Which two engineering organizations define open standards and protocols that apply to the data link layer?</li>
<li>"Products from different manufacturers can interoperate successfully" "What is and advantage of using standards to develop and implement ?"</li>
<li>"a converged network" "Which type of network design combines voice, video, and data on the same communication channel?"</li>
<li>flash "During the boot process, in what memory location will the router bootstrap program look for the IOS image if a TFTP server is not used?"</li>
<li>Confidentiality, Integrity, Availability  "What are the primary requirements of information security? (Choose three.)"</li>
<li>"Products from different manufacturers can interoperate successfully" "What is an advantage of using standards to develop and implement ?"</li>
<li>response timeout, flow control  Which two message timing mechanisms are used in data communication? (Choose two.)</li>
<li>"The network provides predictable levels of service to different types of traffic"  "Which statement describes a network that supports QoS?"</li>
<li>Data link, Physical At which layers of does function? (Choose two.)</li>
<li>"local router"  "Which device acts as gateway to allow hosts to send traffic to remote IP networks?"</li>
<li>SMTP, IMAP4, POP3 What three do email users and servers use to process email? (Choose three.)</li>
<li>"no switchport" "Which interface command must be entered in a Layer 3 switch before IPv4 address can be assigned to the interface?"</li>
<li>"The throughput is predictable, Devices take turns transmitting"  "Which two statements are true of the deterministic access method?(Choose two.)"</li>
<li>virtualization  "A data center has recently updated a physical server to host multiple operating systems on a single CPU. The data center can now provide each customer with a separate web server without having to allocate an actual discrete server for each customer. What is the network trend that is being implemented by the data center in this situation?"</li>
<li>They define how messages are exchanged between the source and the destination.  Which statement is correct about network protocols?</li>
<li>"Public IP addresses must be unique across the entire Internet" "Which statement accurately describes public IP addresses?"</li>
<li>flow control  What method can be used by two computers to ensure that packets are not dropped because too much data is being sent too quickly?</li>
<li>light In fiber optic meda, the signals are represented as patterns of</li>
<li>"Flow control"  "Which message timing factor impacts how much information can be sent and the speed at which it can be delivered?"</li>
<li>Which statement is correct about network ?</li>
<li>flow control  "What method can be used by two computers to ensure that packets are not dropped because too much data is being sent too quickly?"</li>
<li>to add a password to a Cisco network device Why would a network administrator use the CLI of the Cisco IOS?</li>
<li>"when the end-user device will run an application that requires a dedicated connection to the network"  "When is a wired connection preffered to a wireless connection by an end-user device?"</li>
<li>"forwarding rate" "Which term defines the processing capabilities of a switch by rating how much data can be processed per second?"</li>
<li>"providing a richer e-learning environment, providing better social media opportunities"  "What are two benefits of collaboration and video-on-demand applications? (Choose two.)"</li>
<li>"providing the rules required for a specific type of communication to occur"  "What is the purpose of in data communications?"</li>
<li>user EXEC mode  "A router has a valid operating system and a configuration file stored in NVRAM. The configuration file contains an enable secret password but no console password. When the router boots up, which mode will display?"</li>
<li>destination IP address  Which logical address is used for delivery of data to a remote network?</li>
<li>"They originate the data that flows through the network., They are the interface between humans and the communication network." What are two functions of end devices on a network? (Choose two.)</li>
<li>"A network that can reroute traffic in case of device failure"  "What is a fault-tolerant network?"</li>
<li>broadcast Which message delivery option is used when all devices need to receive the same message simultaneously?</li>
<li>DSL "Which technology would be best to provide a home user with a highspeed, always-on Internet connection?"</li>
<li>"Length, Source Port, Checksum" "Which three fields are used in a UDP segment header? (Choose three.)"</li>
<li>to identify which network layer protocol is being used  Which is a function of the Logical Link Control (LLC) sublayer?</li>
<li>Products from different manufacturers can interoperate successfully What is an advantage of using standards to develop and implement protocols?</li>
<li>the privileged executive mode password  What is encrypted with the enable secret command?</li>
<li>"Trailer, frame header" "Which two components are added to the PDU at the network access layer? (Choose two.)"</li>
<li>Connectionless  What is a characteristic of UDP?</li>
<li>"Which command or key combination allows a user to return to the previous level in the command hierarchy?"</li>
<li>EaSt-2+56(config)#  "When the command “Switch(config)# hostname EaSt2+56” is entered in a Cisco IOS device using the CLI, what will be returned in the CLI?"</li>
<li>"They vary depending on"  "Which statement describes a characteristic of the frame header fields of the data link layer?"</li>
<li>Intranet  is a private connection of LANs and WANs that belongs to an organization, and is designed to be accessible only by the members and employees of the organization, or others with authorization.</li>
<li>Segment "What is the PDU?"</li>
<li>"It is as nondeterministic method"  "What is a characteristic of a contention-based access method?"</li>
<li>slower  The farther you are from the central office when utilizing a DSL connection, the</li>
<li>"The host portion of the IP addresses will be different"  "What happens when two devices on the same subnet are communicating?"</li>
<li>"Startup config"  "Where is the configuration used during startup on Cisco IOS devices located?"</li>
<li>"providing end devices with a unique network identifier, directing data packets to destination hosts on other networks" "What are two functions that are provided by the ? (Choose two.)"</li>
<li>encapsulation What process is used to place one message inside another message for transfer from the source to the destination?</li>
<li>broadcast "Which message delivery option is used when all devices need to receive the same message simultaneously?"</li>
<li>a converged network Which type of network design combines voice, video, and data on the same communication channel?</li>
<li>IOS What will a network administrator use to modify a configuration on a Cisco router?</li>
<li>VoIP  "Which type of traffic must receive the highest priority from QoS?"</li>
<li>"to keep track of multiple conversations between devices" "What is the purpose of using a source port number in a TCP communication?"</li>
<li>"The operating system for the Cisco network device" "What is the Cisco IOS?"</li>
<li>"a farm in rural area without wired broadband access" "In which scenario would the use of a WISP be recommended"</li>
<li>"an address that reaches a specific  group of hosts"  "What type of address is 01-00-5E-0A-00-02?"</li>
<li>"easy to create, lacks centralized administration, less cost to implement"  "A company is contemplating whether to use a client/server or a peer-to-peer network. What are three characteristics of a peer-to-peer network? (Choose three.)"</li>
<li>SVI "A technician configures a switch with these commands:"</li>
<li>"to copy an existing configuration into RAM"  "Why would a technician enter the command copy startup-config running config?"</li>
<li>"No centralized administration, Scalability"  "Which of the following are disadvantages of peer-to-peer networking? (Choose two.)"</li>
<li>"startup configuration, IOS image"  "Which two files are loaded into RAM by the router when it boots? (Choose two.)"</li>
<li>What is the function of the kernel of an operating software?</li>
<li>"It is responsible for Media Access Control, it adds a header and trailer to form an OSI Layer 2 PDU" "Which two functions or operations are performed by the MAC sublayer? (Choose two.)"</li>
<li>"Nothing must be done. Changes to the configuration on an IOS device take effect as soon as the command is typed correctly and the Enter key has been pressed." "An administrator has just changed the IP address of an interface on an IOS device. What else must be done in order to apply those changes to the device?"</li>
<li>"A network where voice, video, and data move over the same infrastructure"  "What is a converged network?"</li>
<li>HTTP, TCP, IP,  "A web client is sending a request for a webpage to a web server. From the perspective of the client, what is the correct order of the protocol stack that is used to prepare the request for transmission?"</li>
<li>Host, Network What are the parts of an IPv4 address? (Choose two.)</li>
<li>"Use the console port to locally access the switch from a serial or USB interface of the PC." "Which procedure is used to access a Cisco 2960 switch when performing an initial configuration in a secure environment?"</li>
<li>congestion  "Which term describes the state of a network when the demand on the network resources exceeds the available capacity?"</li>
<li>01-00-5E-00-00-C8 Which address is a multicast MAC address?</li>
<li>Wiki  "What is a group of web pages that groups of individuals can edit and view together called?"</li>
<li>"The MTU is passed to the by the data link layer" "How does the use the MTU value?"</li>
<li>ROM "During troubleshooting procedures, from which location will most Cisco routers load a limited IOS"</li>
<li>Frame Check Sequence  Which field in an frame is used for error detection?</li>
<li>broadcast What type of communication will send a message to all devices on a local area network?</li>
<li>IEEE 802.3  Which standard specifies the MAC sublayer functionality in a computer NIC?</li>
<li>They define how messages are exchanged between the sources and the destination  Which statement is correct about network protocols?</li>
<li>"data encoding, message size, delivery options" "What three functions are defined by network to allow communication between known source and destination IP addresses? (Choose three.)"</li>
<li>no switchport Which interface command must be entered in a Layer 3 switch before IPv4 address can be assigned to the interface?</li>
<li>128 "Your organization is issued the IPv6 prefix of 2001:0000:130F::/48 by your service provider. With this prefix, how many bits are available for your organization to create subnetworks?"</li>
<li>"UDP communication requires less overhead"  "What is an advantage of UDP over TCP?"</li>
<li>"the distance the selected medium can successfully carry a signal, the environment where the selected medium is to be installed"  "What two criteria are used to help select a network medium from various network media? (Choose two.)"</li>
<li>"link-local address"  "Which type of IPv6 address is not routable and used for communication on a single subnet?"</li>
<li>a router  "Which device performs the function of determining the path that messages should take through internet works?"</li>
<li>Internet  "Which TCP/IP model layer is responsible for providing the best path through the network?"</li>
<li>Application, presentation, session  The TCP/IP effectively consists of which three OSI layers?</li>
<li>data encoding, message size, delivery options What three functions are defined by network protocols to allow communication between known source and destination IP addresses? (Choose three.)</li>
<li>DSL, cable  "Which two connection options provide an always-on, high-bandwidth Internet connection to computers in a home office? (Choose two.)"</li>
<li>Nothing must be done. Changes to the configuration on an IOS device take effect as soon as the command is typed correctly and the Enter key has been pressed. An administrator has just changed the IP address of an interface on an IOS device. What else must be done in order to apply those changes to the device?</li>
<li>encapsulation "What process is used to place one message inside another message for transfer from the source to the destination?"</li>
<li>"The branch sites are connected to a central site through point-point links"  "What is a characteristic of a WAN hub-and-spoke topology?"</li>
<li>SMTP  Which application use UDP as the protocol?</li>
<li>"Which PDU is processed when a host computer is de-encapsulating a message at the of the TCP/IP model?"</li>
<li>"This is the default mode on an unconfigured router when first powered up., Only some aspects of the router configuration can be viewed"  "Which two statements are true regarding the user EXEC mode? (Choose two.)"</li>
<li>it can rapidly adapt to the failure of network devices and communication links, Data packets can travel through the network using multiple different paths, Network devices dynamically decide on the best available path to forward each packet. For which three reasons was a packet switched connectionless data communications technology used when developing the Internet (Choose three.)</li>
<li>It does not allow spaces  Which statement describes a feature of an IOS host name configuration?</li>
<li>It is as nondeterministic method  What is a characteristic of a contention-based access method?</li>
<li>"Printer, IP phone, Server, Tablet computer"  "Which devices would be considered end devices on a network? (Choose four.)"</li>
<li>mac sublayer is responsible for communicating directly with the physical layer.</li>
<li>SSH "A network administrator needs to keep the user ID, password, and session contents private when establishing remote CLI connectivity with a switch to manage it. Which access method should be chosen?"</li>
<li>Source, Channel, Receiver "Which of the following elements do both human and computer communication systems have in common? (Choose three.)"</li>
<li>"how connection between nodes appears to the data link layer, how nodes share the media"  "Which two factors influence the method that is used for media access control? (Choose two.)"</li>
<li>Port  What is assigned by the to identify an application or service?</li>
<li>"the original source port number that was randomly generated by the client" "When a client connects to an HTTP server by the use of a randomly generated source port number, what destination port number will the HTTP server use when building a response?"</li>
<li>"A network administrator needs to keep the user ID, password, and session contents private when establishing remote CLI connectivity with a switch to manage it. Which access method should be chosen?"</li>
<li>192.168.1.1:80  "Which number or set of numbers represents a socket?"</li>
<li>"local delivery"  "What type of delivery uses data link layer addresses?"</li>
<li>IAB "What organization is responsible for the overall management and development of Internet standards?"</li>
<li>Low overhead  What is an advantage that UDP has over TCP?</li>
<li>"Intermediary devices direct the path of the data., Intermediary devices connect individual hosts to the network."  Which two statements describe intermediary devices? (Choose two.)</li>
<li>Scalable  network is able to expand to accept new devices and applications without affecting performance.</li>
<li>"A link-local IPv6 address is automatically"  "Which statement is true about an interface that is configured with the IPv6 address command?"</li>
<li>SSH A network administrator needs to keep the user ID, password, and session contents private when establishing remote CLI connectivity with a switch to manage it. Which access method should be chosen?</li>
<li>"It does not allow spaces"  "Which statement describes a feature of an IOS host name configuration?"</li>
<li>"They are dropped." "What happens to frames that are too long or too short for the channel used?"</li>
<li>HTTP, TCP, IP, Ethernet A web client is sending a request for a webpage to a web server. From the perspective of the client, what is the correct order of the protocol stack that is used to prepare the request for transmission?</li>
<li>"Protocol suite"  "What name is given to a group of interrelated necessary to perform a communication function?"</li>
<li>"AppleTalk, Novell NetWare" "Which of the following are examples of proprietary ? (Choose two.)"</li>
<li>Trailer, frame header Which two components are added to the PDU at the network access layer? (Choose two.)</li>
<li>This is the default mode on an unconfigured router when first powered up., Only some aspects of the router configuration can be viewed  Which two statements are true regarding the user EXEC mode? (Choose two.)</li>
<li>Intermediary devices direct the path of the data., Intermediary devices connect individual hosts to the network.  Which two statements describe intermediary devices? (Choose two.)</li>
<li>(config) # service password-encryption  What command will prevent all unencrypted passwords from displaying in plain text in a configuration file?</li>
<li>a web page that groups of people can edit and review  What is a wiki?</li>
<li>The network provides predictable levels of service to different types of traffic  Which statement describes a network that supports QoS?</li>
<li>to copy an existing configuration into RAM  Why would a technician enter the command copy startup-config running config?</li>
<li>spyware During a routine inspection, a technician discovered that software that was installed on a computer was secretly collecting data about websites that were visited by users of the computer. Which type of threat is affecting this computer</li>
<li>"Type the command and then press the? key"  "A network administer has forgotten the argument of an IOS command. How would the administrator get help from the IOS CLI to complete the command correctly?"</li>
<li>"the original source port number that was randomly generated by the client" "When a client connects to an HTTP server by the use of a randomly generated source port number, what destination port number will the HTTP server use when building a response?"</li>
<li>local delivery  What type of delivery uses data link layer addresses?</li>
<li>, "Which two Internet connection options do not require that physical cables be run to the building? (Choose two.)"</li>
<li>Window size Which TCP header field specifies the number of bytes that can be accepted before an acknowledgement is required?</li>
<li>cellular, satellite Which two Internet connection options do not require that physical cables be run to the building? (Choose two.)</li>
<li>how connection between nodes appears to the data link layer, how nodes share the media  Which two factors influence the method that is used for media access control? (Choose two.)</li>
<li>latency An administrator measured the transfer of usable data across a 100 Mb/s physical channel over a given period of time and obtained 60 Mb/s. Which kind of measurement did the administrator obtain</li>
<li>"The part of the FTP message that was lost is re-sent"  "What happens if part of an FTP message is not delivered to the destination?"</li>
<li>"response timeout, flow control"  "Which two message timing mechanisms are used in data communication? (Choose two.)"</li>
<li>a VTY password  "What is the primary defense against unauthorized remote access to network devices?"</li>
<li>segment Which PDU is processed when a host computer is de-encapsulating a message at the transport layer of the TCP/IP model?</li>
<li>Multicast "What is the name given to a one-to-many message delivery option?"</li>
<li>Use the console port to locally access the switch from a serial or USB interface of the PC. Which procedure is used to access a Cisco 2960 switch when performing an initial configuration in a secure environment?</li>
<li>FFFF.FFFF.FFFF  "Which destination address is used in an ARP request frame?"</li>
<li>wireless LAN  Which area of the network would a college IT staff most likely have to redesign as a direct result of many students bringing their own tablets and smartphones to school to access school resources?</li>
<li>exit  "Which command or key combination allows a user to return to the previous level in the command hierarchy?"</li>
<li>an intranet "An employee at a branch office is creating a quote for a customer. In order to do this, the employee needs to access confidential pricing information from internal servers at the Head Office. What type of network would the employee access?"</li>
<li>spyware "During a routine inspection, a technician discovered that software that was installed on a computer was secretly collecting data about websites that were visited by users of the computer. Which type of threat is affecting this computer"</li>
<li>SVI A technician configures a switch with these commands:</li>
<li>"Console port"  "What type of connection to a Cisco IOS switch is used to make the initial configuration?"</li>
<li>applications  "Which entities are involved in a temporary communication that is established by the ?"</li>
<li>FF-FF-FF-FF-FF-FF Which address is used as a destination address on a broadcast frame?</li>
<li>"Physical, Data link" "Which of the following OSI model layers have the same functionality as the network access layer in the TCP/IP model? (Choose two.)"</li>
<li>Frame delimiting, Addressing, Error detection What are the primary functions associated with data encapsulation at the MAC sublayer? (Choose three.)</li>
<li>an address that reaches a specific group of hosts What type of address is 01-00-5E-0A-00-02?</li>
<li>exit  Which command or key combination allows a user to return to the previous level in the command hierarchy?</li>
<li>"Directed broadcasts are intended for all hosts on a local or remote network, Limited broadcasts are only intended for the hosts on a local network"  "Which two statement describe broadcast transmissions on a wired network? (Choose two.)"</li>
<li>broadcast "What type of communication will send a message to all devices on a local area network?"</li>
<li>when the end-user device will run an application that requires a dedicated connection to the network  When is a wired connection preffered to a wireless connection by an end-user device?</li>
<li>"Leased lines, Metro" "Which of the following are business-class Internet connection technologies normally supplied by a service provider? (Choose two.)"</li>
<li>"to display the host routing table" "What is the command netstat –r used for?"</li>
<li>an intranet An employee at a branch office is creating a quote for a customer. In order to do this, the employee needs to access confidential pricing information from internal servers at the Head Office. What type of network would the employee access?</li>
<li>applications  "Which entities are involve in a temporary communication that is established by the ?"</li>
<li>"Flow Label"  "When transporting data from real-time applications, such as streaming audio and video, which field in the IPv6 header can be used to inform the routers and switches to maintain the same path for the packets in the same conversation?"</li>
<li>wireless LAN  "Which area of the network would a college IT staff most likely have to redesign as a direct result of many students bringing their own tablets and smartphones to school to access school resources?"</li>
<li>"to establish the media link" "What is the purpose of the physical link control field in a data link layer header?"</li>
<li>congestion  Which term describes the state of a network when the demand on the network resources exceeds the available capacity?</li>
<li>The branch sites are connected to a central site through point-point links  What is a characteristic of a WAN hub-and-spoke topology?</li>
<li>"The client sends a synchronization segment to begin the session" "Which action is performed by a client when establishing communication with a server via the use of UDP at the ?"</li>
<li>SVI "A technician configures a switch with these commands:"</li>
<li>experimental  "A user is unable to access the company server from a computer. On issuing the ipconfig command, the user finds that the IP address of the computer is displayed as 169.254.0.2. What type of address is this?"</li>
<li>"it can rapidly adapt to the failure of network devices and communication links, Data packets can travel through the network using multiple different paths, Network devices dynamically decide on the best available path to forward each packet"  "For which three reasons was a packet switched connectionless data communications technology used when developing the Internet (Choose three.)"</li>
<li>"Switch# show?" "What command will display a list of keywords available for viewing the status of an IOS switch?"</li>
<li>Presentation  "Which OSI reference model layer is responsible for common representation of the data transferred between services?"</li>
<li>Type the command and then press the? key  A network administer has forgotten the argument of an IOS command. How would the administrator get help from the IOS CLI to complete the command correctly?</li>
<li>64 bytes – 1518 bytes What is the minimum and maximum frame size as defined by IEEE 802.3?</li>
<li>"a farm in a rural area without wired broadband access" "In which scenario would the use of a WISP be recommended?"</li>
<li>"IP addressing scheme"  "What type of information would be found on a logical topology diagram?"</li>
<li>loopback  address is defined as a reserved address that routes packets back to the host</li>
<li>Time-to-Live  "Which value, that is contained in an IPv4 header field, is decremented by each router that receives a packet?"</li>
<li>"a web page that groups of people can edit and review"  What is a wiki?</li>
<li>the distance the selected medium can successfully carry a signal, the environment where the selected medium is to be installed  What two criteria are used to help select a network medium from various network media? (Choose two.)</li>
<li>The kernel provisions hardware resources to meet software requirements. What is the function of the kernel of an operating software?</li>
<li>easy to create, lacks centralized administration, less cost to implement  A company is contemplating whether to use a client/server or a peer-to-peer network. What are three characteristics of a peer-to-peer network? (Choose three.)</li>
<li>DSL, cable  Which two connection options provide an always-on, high-bandwidth Internet connection to computers in a home office? (Choose two.)</li>
<li>a farm in a rural area without wired broadband access In which scenario would the use of a WISP be recommended?</li>
<li>The first 6 hexadecimal digits of a MAC address represent the OUI., The vendor is responsible for assigning the last 24 bits of the MAC address., The MAC address is also known as a burned-in address. What is true about the MAC address? (Choose three.)</li>
<li>spyware "During a routine inspection, a technician discovered that software that was installed on a computer was secretly collecting data about websites that were visited by users of the computer. Which type of threat is affecting this computer?"</li>
<li>Tab To save time, IOS commands may be partially entered and then completed by typing which key or key combination?</li>
<li>"gateway of last resort"  "Which feature on a Cisco router permits the forwarding of traffic for which there is no specific route?"</li>
<li>Frame What is the name given to the MAC sublayer PDU?</li>
<li>"This is the default mode on an unconfigured router when first powered up, Only some aspects of the router configuration can be viewed" "Which two statements are true regarding the user EXEC mode? (Choose two.)"</li>
<li>The throughput is predictable, Devices take turns transmitting  Which two statements are true of the deterministic access method?(Choose two.)</li>
<li>"Which statement is correct about network ?"</li>
<li>IOS "What will a network administrator use to modify a configuration on a Cisco router?"</li>
<li>"a web page that groups of people can edit and review"  "What is a wiki?"</li>
<li>They originate the data that flows through the network., They are the interface between humans and the communication network. What are two functions of end devices on a network? (Choose two.)</li>
<li>1024 to 49151 What range of ports can either be used by TCP or UDP to identify the requested service on the destination device or as a client source port?</li>
<li>FTP "Which protocol allows users on one network to reliably transfer files to and from a host on another network?"</li>
<li>"Through the CLI using a terminal emulator" "How is the Cisco IOS generally accessed and navigated?"</li>
<li>virtualization  A data center has recently updated a physical server to host multiple operating systems on a single CPU. The data center can now provide each customer with a separate web server without having to allocate an actual discrete server for each customer. What is the network trend that is being implemented by the data center in this situation?</li>
<li>"The default gateway address is used to forward packets originating from the switch to remote networks."  "Within a production network, what is the purpose of a switch with a default gateway address?"</li>
<li>IEEE  "Which organization is responsible for the standard that defines Media Access Control for wired ?"</li>
<li>harvey senina - harvey is a developer friend he is responsible for having a big impact in testing the site :)</li>
<li>jeraldine garcia - the main CEO or chief execucitive officer she is responsible for the whole purpose of the site :)</li>
<li>lawrence fulo ragasa - lawrence is a developer friend and almost identical name and he has been found hovering wierd to my site :)</li>
<li>eonvher tatualla andres jr. - eonvher is a developer friend and one of my cheerfull player in my site and has been caught checking my site the orginal one :)</li>
<li>mariel atienza - mariel is my crush :)))))))))))))))))))))))))))))</li>
<li>Realism Is another style of art whose interest and concern centered on the actual or real problems.</li>
<li>Crayons Are pigments bound by wax and compressed into painted sticks used for drawing especially among children in the elementary grade.</li>
<li>Theatre A kind of play was performed in China more than 3,000 years ago. When the seasons changed young men and women from different villages met at places where rivers joined and sang danced and acted in praise of the gods</li>
<li>Decorative Art  The following are the major types of art except?</li>
<li>TRUE  Repetition of angles and curves, shapes, lines and color will give a harmonious effect. If overdone though, repetition may become monotonous and it may fail to hold the attention and interest of observers.</li>
<li>Sculpture → Three-Dimensional Visual, Ceramic → Three-Dimensional Visual, Clay Models → Three-Dimensional Visual, Photographs → Two-Dimensional Visual, Drawing → Two-Dimensional Visual, Books → Auditory, Songs → Auditory, Painting → Two-Dimensional Visual Identify if the following type of art is two dimensional-visual, three dimensional-visual or auditory art</li>
<li>Gothic  This style of architecture originated in the middle of the century. It is characterized by pointed arch and ribbed vault</li>
<li>TRUE  The primary colors are red, yellow and blue. These are called primary colors because all other colors are produced by combining any of the two colors.</li>
<li>Auditory  On the basis of medium, the arts are primarily classified as: Visual and __________?</li>
<li>Tapestry  A form of artwork using colored threads which are woven by hand to produce a design</li>
<li>TRUE  Art communicates feelings and emotions expressively and forcefully</li>
<li>TRUE  Color is also used to create emphasis. Contrast of colors can be used to produce a center of interest.</li>
<li>Red → Primary Color, Violet → Secondary Color, Green → Secondary Color, Yellow → Primary Color, Orange → Secondary Color, Blue → Primary Color  Label the colors according to their types.</li>
<li>Green → Secondary Color, Violet → Secondary Color, Orange → Secondary Color, Yellow → Primary Color, Red → Primary Color, Blue → Primary Color  Label the colors according to their types.</li>
<li>Mosaic  A form of art which is often a picture or decoration made of colored stones or glass</li>
<li>Drama __________is an art form in which the performers act a story to the audience. It is a combination of different arts</li>
<li>Value Properties of Colors denote the lightness and darkness of a color. Colors can be made darker by making the pigments thicker, adding black, or adding a little of its complement. Colors can be made lighter by adding water or oil or white.</li>
<li>Line  as an element it is the simplest, most ancient and most universal means for creating visual art.</li>
<li>Intermediate Color  These colors are yellow orange, red orange, red violet, blue violet, blue green and yellow green.</li>
<li>Pastel  This is a stick of dried paste mage of pigments ground with chalk and compounded with gum water. Its colors are luminous, and it is a very flexible medium. Some artists use a fixing medium or a protecting surface such a glass, but when the chalk rubs, the picture loses some of its brilliance.</li>
<li>TRUE  Painting and Sculpture is an important characteristic of the period was the spirit of scientific inquiry and investigation. This new and vital approach to the materials world led to empiricism, which lay on the evidence of the senses. The artists strove for a more naturalistic portrayal of man and developed new techniques such as modeling shading for a three dimensional effect.</li>
<li>FALSE Chimes are bass instruments</li>
<li>Granite Include any of a class of elementary substances as gold, silver or copper all of which are characterized by capacity, ductility, conductivity and peculiar luster when freshly fractured.</li>
<li>Architecture  The following are the minor types of art except?</li>
<li>Ivory Is another by product of metal consisting of copper and tin with color and is one of the most universally popular metals for sculpture.</li>
<li>TRUE  A work of art achieves unity when its parts are necessary to the composition. In the visual arts, it is achieved by establishing a pleasing relationship between the different elements. There is unity and harmony if the various parts of a design will give an appearance of belonging together.</li>
<li>Cubism  Is a style of painting and sculpture developed in the early 20th century characterized chiefly by an emphasis on the formal structure of a work of art and the reduction of natural forms of their geometrical equivalent.</li>
<li>Value the relative degree of lightness and darkness in a graphic work of art or painting. It indicates the degree of luminosity that is the presence or absence of light.</li>
<li>TRUE  Balance may either be formal or informal</li>
<li>Tempera Type of painting that uses mineral pigments mixed with egg yolk or egg white and ore</li>
<li>FALSE The baroque style of architecture prevailed in Europe during the 17th and 19th centuries and was characterized by elaborate and grotesque forms and ornamentation</li>
<li>Decorative Art  Is concerned with design and decoration of object that is chiefly prized for its utility, rather than for its purely aesthetic qualities like ceramics, metal ware, furniture, textiles, clothing, and others</li>
<li>Balance A work of art possesses balance when its visual or actual weights or masses are distributed in such a way that they achieve harmony. Balance gives a feeling of stability and rest</li>
<li>Maritime Transport  Is a branch of art that creates boat houses, boat making, maritime traditions</li>
<li>Visual  __________________ are those whose mediums can be seen and which occupy space</li>
<li>TRUE  Piccolo is a small flute and has a higher octave than a regular flute</li>
<li>Fresco  Type of painting that is done on moist plaster surface with colors in ground water or lime water.</li>
<li>Intaglio  A printing process in which the design or the text is engraved into the surface of the place and the ink is transferred to paper from the groover.</li>
<li>Crayons The following are the Major Types of Prints except?</li>
<li>Painting and Sculpture  An important characteristic of the period was the spirit of scientific inquiry and investigation. This new and vital approach to the materials world led to empiricism, which lay on the evidence of the senses.</li>
<li>Water color A medium of art that is difficult to handle because it is challenge in producing warm and rich tones</li>
<li>Literature  poetry, fiction, essay and literary art criticism.</li>
<li>Graphic Art It refers to the art of drawing or painting or print making which focuses on visual communication and presentation</li>
<li>Violet → Secondary Color, Red → Primary Color, Blue → Primary Color, Yellow → Primary Color, Orange → Secondary Color, Green → Secondary Color  Label the colors according to their types.</li>
<li>Artistic Expressions  non ornamental metal crafts, martial arts, supernatural healing arts, medicinal arts, and constellation traditions</li>
<li>TRUE  Artist identify their mediums through inspiration</li>
<li>Plastic Art Includes those visual art that involve the use of materials that can be molded or modulated in some way often in three dimensions clay, paint and plaster</li>
<li>Marble  Is the hard substance formed from mineral and earth material. The finish is granular and dull in appearance. These are normally used for gravestones in cemeteries.</li>
<li>Jade  Is limestone in a more or less crystalline state and is capable of taking a high polish, occurring in many varieties. It is easier to carve than granite</li>
<li>Soul Making Is the process where the basic seed of divine intelligence in all humans goes through necessary experience, especially suffering the transform into a unique Soul</li>
<li>Red Is a basic color. It typifies fire, blood, danger, festivity, bravery, war, passion, energy, and warmth.</li>
<li>Engraving A type of print whereby artwork is created by forming designs by cutting, corrosion by acids.</li>
<li>Intensity Properties of Colors denote the brightness and dullness of a color. Colors differ in intensity or vividness.</li>
<li>Universality  Is the quality of artwork that should answer the elements of truth in the artwork which is something permanent and not just of the momentary value?</li>
<li>Classical Period 1589-1715  This period is notable for the dignity, sobriety, and masculine quality of its foremost buildings, resulting from the subordination of plan, composition and detail and the unity of the whole, and the charity and simplicity with which the elements were used.</li>
<li>Drawing A form of artwork in paper using pen and ink or charcoal</li>
<li>Traditional Arts  Bearers of traditional art can be nominated as Gawad Manlilikha ng Bayan equal to National Artist</li>
<li>Emotions  A form of use of art element whereby art expresses by the different elements which symbolize or suggest feelings.</li>
<li>Pastel  Type of painting that uses dried paste mage of pigments ground with chalk with gum water</li>
<li>Yellow → Primary Color, Blue → Primary Color, Red → Primary Color, Orange → Secondary Color, Violet → Secondary Color, Green → Secondary Color  Label the colors according to their types.</li>
<li>Music Is a type of major arts form whose medium is sound organized in time. Common elements of music are pitch which governs melody and harmony rhythm, tempo, meter and articulation, dynamics and the sonic qualities of timbre and texture.</li>
<li>Yellow  Is the color of light. This is the color which is often mistaken as a color of jealousy. It symbolizes life, joy, sunshine, cheerfulness, warmth, splendor and hospitality.</li>
<li>Expressionism Is a manner of painting and sculpturing in which natural forms and colors are distorted and exaggerated this style of art</li>
<li>Fresco  This is the painting on a moist plaster surface with colors ground in water or a limewater mixture</li>
<li>Dance Dance choreography, dance direction and dance performance</li>
<li>TRUE  Cymbals are percussion instruments</li>
<li>Modern  __________________art is characterized by contemporary styles of visual art, music and literature</li>
<li>Glass Is a natural earthy material that has the nature of plasticity when wet, consisting essentially of hydrated silicates of aluminum used for making bricks and ceramics.</li>
<li>Symbols A form of use of art element that is usually made up of different shapes to depict or symbolize objects.</li>
<li>Pink  Is a combination of red and white symbolizes love</li>
<li>Painting  is the practice of applying paint, pigment, color or other medium to a surface like wall, paper, canvas wood and glass</li>
<li>Plaster Is a fine, colorful stone usually green, and used widely in Ancient China. It is highly esteemed as an ornamental stone for carving and fashioning jewelry.</li>
<li>Stained Glass A form of artwork used in Gothic Cathedral and Churches</li>
<li>Bronze  Is a composition of lime, sand and water this is applied on walls and ceilings and allowed to harden and dry. The medium is used extensively for making manikins, models, molds, architectural decorations and other indoor sculpture.</li>
<li>Black Is the darkest and the dullest of the deep. It is only considered a color when mixed with other colors. It is only considered a color when mixed with other colors. It suggests despair, gloom, death and, mourning.</li>
<li>Isaac Newton  A scientist proposed his idea on how colors are perceived and the phenomenon of seeing colors</li>
<li>Yellow → Primary Color, Orange → Secondary Color, Green → Secondary Color, Violet → Secondary Color, Red → Primary Color, Blue → Primary Color  Label the colors according to their types.</li>
<li>Surrealism  Is a style of art and literature developed principally in the 20th century, stressing the subconscious or non-rational significance of imagery at automatism or the exploitation of change effects, unexpected juxtapositions and symbolic objects.</li>
<li>Acrylic Mediums that is considered more popular among artist because of its transparent characteristic and has the same flexibility as oil.</li>
<li>Clay Models → Three-Dimensional Visual, Drawing → Two-Dimensional Visual, Painting → Two-Dimensional Visual, Ceramic → Three-Dimensional Visual, Sculpture → Three-Dimensional Visual, Books → Auditory, Songs → Auditory, Photographs → Two-Dimensional Visual Identify if the following type of art is two dimensional-visual, three dimensional-visual or auditory art</li>
<li>Technique ___________________is the manner in which the artist controls his medium to achieve the desired effect</li>
<li>TRUE  Manipulation of art to express ideas is also known as technique</li>
<li>Whang- Od The last mambabatok and a national icon, performing the batek tattoo art of the Butbut Kalinga</li>
<li>Stone Is a medium that is hard, brittle, noncrystalline, more or less transparent substances produced by fusion, usually consisting of mutually dissolved silica and silicates and contains soda and lime.</li>
<li>Stencil Printing  It is a process which involves the cutting of the design on special paper cardboard or metal sheet in such a way that when ink is rubbed over it, the design is reproduced on the surface.</li>
<li>Light and Shadow  known as chiaroscuro, from the Italian word for light and dark is different from value.</li>
<li>Metals  Which comes from the main parts of the tasks of elephants is the hard white substance use to make carvings and billiards balls.</li>
<li>Brass Is a granular igneous rock composed of feldopars and quartz, usually combined with other minerals and is quite difficult to chisel. This is good for large works with only a few designs.</li>
<li>Jose Garcia Villa Filipino artists who shared in this belief. On the other hand, some have asserted that there is something about the essence of art that transcends the human occupation with usefulness. Others have held that there is the tendency to lose sight of art's beauty and wonderment if one analyzes it too closely. It provides us with the opportunity to examine what it takes and what it means to be human.</li>
<li>TRUE  Double bass is the longest of the string instrument and has the lowest pitch</li>
<li>Bistre  Is a brown pigment extracted from the soot of wood, and often used in pen and wash drawings.</li>
<li>Universality  Is a criterion that tells about the scope and significance of a work of art.</li>
<li>Folk Graphic Arts Is a branch of arts that creates calligraphy, tattooing, folk writing, folk drawing and folk painting</li>
<li>Texture is the surface treatment of an artistic work in order to give variety and beauty to any work of art.</li>
<li>Space is an art element which is concerned with making all parts functional so that all parts of the work of art will contribute to make the whole a complete work of art.</li>
<li>Color is the quality of an object or substance with respect to light reflected by it, and usually determined visually by measurement of hue, saturation and brightness of the reflected light.</li>
<li>Clay Models → Three-Dimensional Visual, Songs → Auditory, Drawing → Two-Dimensional Visual, Photographs → Two-Dimensional Visual, Sculpture → Three-Dimensional Visual, Books → Auditory, Ceramic → Three-Dimensional Visual, Painting → Two-Dimensional Visual Identify if the following type of art is two dimensional-visual, three dimensional-visual or auditory art</li>
<li>Lead  Are used as casting materials for small objects like medals, coins and pieces of jewelry.</li>
<li>Surrealism  Is a style of art and literature developed principally in the 20th century, stressing the subconscious or non-rational significance of imagery at automatism or the exploitation of change effects, unexpected juxtapositions and symbolic objects?</li>
<li>TRUE  Emphasis is important because it relieves monotony. It can also be used to call attention to pleasing center of interest</li>
<li>Roman Architecture (300 -C- AD 365) This period provided much of the decorative inspiration of some Roman building types. Greek Hellenic architecture had mostly benn of a religious character, but from the fourth century ~C onwards, public buildings multiplied in type and number and passed into permanent form.</li>
<li>Baroque __________________ form of architecture prevailed in Europe during the 17th and 18th centuries and was characterized by elaborate and grotesque forms and ornamentations.</li>
<li>Gold and Silver Which has a peculiar brilliance, is used as a costing medium. This is basically shaped by hammering. It can into relief forms.</li>
<li>Crayons Are pigments bound by wax and compressed into painted sticks used for drawing especially among children in the elementary grade. They adhere better on paper surface.</li>
<li>Books → Auditory, Sculpture → Three-Dimensional Visual, Clay Models → Three-Dimensional Visual, Painting → Two-Dimensional Visual, Songs → Auditory, Photographs → Two-Dimensional Visual, Ceramic → Three-Dimensional Visual, Drawing → Two-Dimensional Visual Identify if the following type of art is two dimensional-visual, three dimensional-visual or auditory art</li>
<li>SilverPoint In this medium, the artist has technique of drawing with a silver stylus on specially prepared paper to produce a thin grayish line that was popular during the Renaissance period.</li>
<li>Encaustic Mediums used by early Egyptians on the painted portrait on mummy cases</li>
<li>Emotions  Are expressed by the different elements which symbolize or suggest feelings i.e. despair, mourning, hope, love, passion, hate, anger, fear, and actions like conflict, struggle, crying, violence, kissing and laughing.</li>
<li>Stone Is the hard substance formed from mineral and earth material. The finish is granular and dull in appearance. These are normally used for gravestones in cemeteries</li>
<li>Oil Painting is one of the most expensive art activities today because of the prohibitive cost of materials.</li>
<li>Woodcut A type of print where the design stands as a relief characteristically identified by their firm, clear and black lines.</li>
<li>Carving Including, but not limited to woodcarving and folk non clay sculpture</li>
<li>Fashioned Design  Is the applied art dedicated to clothing and lifestyle accessories created within the cultural and social influences of a specific time</li>
<li>Print Making  A print is anything printed on a surface that is a direct result from a duplicating process.</li>
<li>FALSE Cello is the smallest string instrument and has the highest pitch</li>
<li>Popular Art It refers to any dance, literature, music, theatre, or other art form intended to be received and appreciated by ordinary people in a literate and technologically advanced society dominated by urban culture.</li>
<li>Realistic Painting  form and content try to make a moving human message are works of artists who are highly sensitive people, feeling and living with their society and finding art a vehicle for communicating significant human experience</li>
<li>Hindu These religious and cultural influences mostly came through trade with Southeast Asian Thassalocratic empires such as the Srivijaya and Majapahit which had turn trade relationships with India</li>
<li>Abstract  Is conceived apart from any concrete realities, or specific objects. It pertains to the formal aspect of art emphasizing lines, colors, and generalized geometric forms. This kind of art is a logical extension of cubism with its fragmentation of the object.</li>
<li>Impressionism Is a style of painting developed in the last third of the 19th century, characterized by short brisk strokes of bright colors used to recreate the impression of light on objects.</li>
<li>Form  This is the external appearance of a clearly defined area. It is the visual shape of an object or thing found in nature.</li>
<li>Yellow → Primary Color, Green → Secondary Color, Blue → Primary Color, Red → Primary Color, Orange → Secondary Color, Violet → Secondary Color  Label the colors according to their types.</li>
<li>Proportion  is the comparative relationship of the parts of or composition to each other and to the whole. Much of classical Greek Parthenon was constructed according to the principle of the golden section, which states that a small part must relate to a larger part as the lager part relates to the whole.</li>
<li>TRUE  Contrast of colors can be used to produce a center of interest.</li>
<li>Oil Mediums that is considered one of the most expensive because it is characterized by its flexibility.</li>
<li>Renaissance Art The term came from the French language meaning rebirth.The ideals of classicism balance, harmony, proportion and intellectual order became the artistic standard of the time.</li>
<li>Ling Ling- O  Is an omega shaped type of pendant or amulet that has been associated with various indigenous cultures of the Philippines since the early metal age.</li>
<li>Copper  An alloy of copper and zinc is not popularly used by artists because of its limitations as a medium. Although it has many practical uses, brass does not rust and it takes a brilliant polish.</li>
<li>TRUE  Metaphor is an image or phrase that carries the reader above the literal sensory realm of invisible imagination.</li>
<li>Architecture  Is the art and science of building when one speaks of architecture it would always by associated with houses, churches, commercial buildings or any other structures.</li>
<li>Violet → Secondary Color, Red → Primary Color, Orange → Secondary Color, Green → Secondary Color, Blue → Primary Color, Yellow → Primary Color  Label the colors according to their types.</li>
<li>Orange  The secondary colors are green, violet, and __________ ?</li>
<li>Pottery ceramic making, clay pot making and folk clay sculpture</li>
<li>Pencil  Drawing can be done with different kinds of mediums and the most common is ____________ which comes in different degrees of hardness or softness</li>
<li>Clay  A bluish gray metal is used for casting and forging. With the help of a welding torch iron, it can be worked into a variety of unique and exciting forms.</li>
<li>Charcoal  Are carbonaceous materials obtained by heating wood or other organic substances in the absence of air.</li>
<li>Architecture  Is the art or science of building specifically the art or practice of designing and building structures and especially habitable ones.</li>
<li>Ceramic → Three-Dimensional Visual, Books → Auditory, Painting → Two-Dimensional Visual, Clay Models → Three-Dimensional Visual, Photographs → Two-Dimensional Visual, Drawing → Two-Dimensional Visual, Sculpture → Three-Dimensional Visual, Songs → Auditory Identify if the following type of art is two dimensional-visual, three dimensional-visual or auditory art</li>
<li>Medium  ___________________denotes the way an artist communicates ideas</li>
<li>Formal Balance  It is also called symmetrical balance. This is achieved by making both sides exactly alike. Objects of the same size and shape when arranged on two sides of center will produce formal balance.</li>
<li>Batok Is a form of indigenous tattoing of the kalinga people in the Cordilleras.</li>
<li>TRUE  Art is not, as the metaphysicians say, the manifestation of some mysterious idea of beauty or God; it is not, as the aesthetical physiologists say, a game in which man lets off his excess of stored up energy; it is not the expression of man's emotions by external signs; it is not the production of pleasing objects.</li>
<li>Indigenous Art  Is sometimes used to refer to the utility of indigenous materials as a medium for the creation of different kinds of artworks.</li>
<li>TRUE  On the basis of medium, the arts are primarily classified as: Visual and Auditory.</li>
<li>Allied Arts Non folk architecture, interior design, landscape architecture and urban design.</li>
<li>Agrarian Reform This aims to provide changes and reconstructing the whole system of agriculture.</li>
<li>Dr. Jose P. Rizal He was known as a patriot, physician and man of letters who served as an inspiration to the Philippine Nationalist movement. His work El filibusterismo and Noli Me Tangere are his ways to promote nonviolent resistance to the Spaniards.</li>
<li>Mindanao  The Philippines has two lines of recorded advancement. The primary line, which is the more established, came to create in ________ and Sulu. Furthermore, this alludes to the Muslim line of chronicled improvement.</li>
<li>Epifanio de los Santos  The acronym EDSA stands for _________________________________.</li>
<li>Apolonio Samson On August 26th, a big meeting was held in Balintawak, at the house of __________, then Cabeza of that barrio of Caloocan.</li>
<li>Mazava  Sailing southwards along the coast of that large island of Seilani, they turned southwest to a small island called _______.</li>
<li>59  ______ percent of fish and sardines are to a great extent taken from the Sulu Sea.</li>
<li>Article IX  Article ____ stated, "All these shall be beaten for two days: who sing while traveling by night; kill the Manaul; tear the documents belonging to the headmen; are malicious liars; or who mock the dead".</li>
<li>500 The Philippine Muslims was at one time a prevailing gathering in the nation. They have _______ year's political history, so far the longest political experience contrasted with different gatherings in the entire Philippines.</li>
<li>Cold War  With the finish of the_______, the global group saw new patterns and dangers to security that required less military power.</li>
<li>Cotabato  The ________ had been the seat of the Maguindanao sultanate.</li>
<li>Article XIII  Article ____ stated, "All these shall be exposed to ants for half a day: who kill black cats during a new moon; or steal anything from the chiefs or agorangs, however small the object may be.</li>
<li>Spain La Solidaridad is also published in ________, as a representation and eye opener to his fellow Filipino.</li>
<li>Arcticle VIII Article ____ stated, "Slavery for a doam (a certain period of time) shall be suffered by those who steal away the women of the headmen; by him who keep ill-tempered dogs that bite the headmen; by him who burns the fields of another".</li>
<li>October 16, 1907  The First Philippine Assembly, was organized on __________________, this assembly was composed of educated Filipinos from well-known clans such as Osmena and Quezon, they strengthened the issues of direct independence for the Filipinos and this was stated by sending political missions to the United States Congress.</li>
<li>National Library  _________ is collection of all productions in the nation and from abroad; disperses learning by serving the perusing open.</li>
<li>External Criticism  Sometimes called as "lower criticism"</li>
<li>1932  ________ a national lottery was established to create more revenue for the government.</li>
<li>Butuan  ________ has long been believed as the site of the first mass.</li>
<li>Andres Bonifacio  _________ asked the people to give a pledge that they were to revolt.</li>
<li>November 1, 1897  The Constitution of the Biak-na-Bato was promulgated by the Philippine Revolutionary Government on___________________.</li>
<li>April 8 1521  The expedition's arrival and celebration of Mass on_________.</li>
<li>Martyrdom _____________ is widely accepted as the dawn of the Philippine Nationalism in the nineteenth century, with Rizal dedicating his second novel, El Filibustersimo, to their memory.</li>
<li>Rizal's name  The password that Katipunero used.</li>
<li>30 December 1896  The First was published in La Voz Espanola and Diario de Manila on the Day of execution, ________.</li>
<li>Ateneo Municipal de Manila  Antonio Luna earned a degree in Bachelor of Arts from ___________________.</li>
<li>Guam  Melchora Aquino was captured and exiled in _______ for helping the kapituneros.</li>
<li>April 4 Magellan leave Mazaua, bound for Cebu on Thursday __________.</li>
<li>1903 Homested program The program permits a tenant to enter into a farming business by attaining a farm by a given number of hectares but it was only limited to Northern Luzon and Mindanao, where colonial diffusion had been tough for Americans, a problem they innate from the Spaniards. This was called as ________________.</li>
<li>Tinikling This type of national dance with a couple of artists bouncing between two bamboo posts held simply over the ground and struck together.</li>
<li>Guerrero  According to___________, "Encarnacion and Villegas all these places are in Balintawak, then part of Caloocan, now, in Quezon City. As for the dates, Bonifacio and his troops may have been moving from one place to another to avoid being located by the Spanish government, which could explain why there are several accounts of the Cry".</li>
<li>Corazon Aquino  The symbol of the restoration of democracy and the takeover of the Marcos Dictatorship in 1956.</li>
<li>Mindanao and Sulu The first country of the Philippine Muslims.</li>
<li>Literature  Writings that describe occasions, thoughts and feeling utilizing uncommon expressive implies in a particular frame and has lasting and more extensive intrigue and incentive to others, for example, verse, stories, books, expositions, account, annals, letters, engravings, and so forth. Dialect is the medium of articulation utilizing different abstract systems that create inside its artistic, social and chronicled custom. Writing can likewise be oral like stories, fantasies, enigmas, sayings, serenades, summons, mantras, enchantment spells, and so forth.</li>
<li>Senior Maure  The assistant of the Plaza, the Assistant ___________, asked Rizal if he wanted anything.</li>
<li>Proclamation 1081 Martial Law is also known as the ____________ declared by the late President Ferdinand E. Marcos that lasted from 1972 to 1985.</li>
<li>Sa Aking Mga Kababata Dr. Jose P. Rizal wrote this poem when he was eight years old and it is Rizal's one of the most prominent works.</li>
<li>Antonio Luna  Aside from war, politics and chemistry he also opened a fencing club in Manila. He promoted fencing as a sport and a hobby during his time.</li>
<li>Cedula  Year 1884, the payment of tribute was put to a stop and was replaced by a poll tax collected through a certificate of identification called the _________ personal.</li>
<li>Article XVII  Article ____ stated, "These shall be killed: who profane sites where idols are kept, and sites where are buried the sacred things of their diwatas and headmen. He who performs his necessities in those places shall be burned".</li>
<li>Nobody  According to Corazon Aquino's Speech she said, "The dictator had called him a__________. Yet, two million people threw aside their passivity and fear and escorted him to his grave".</li>
<li>Manuel Roxas  He was the first president of the Independent Philippine Republic</li>
<li>Leyte Ceylon was the island of _______.</li>
<li>Iranun  These individuals have possessed the region flanking between Lanao del Sur and Maguindanao territory.</li>
<li>Dance Movement of the feet, arms and the entire body musically particularly to music. A few moves and tunes are performed without melodic backup or a capella. Other than those specified before in the visual expressions, the components of shape one of a kind to move are: body developments, motion, and outward appearances, including outfit, organize setting, the sort of backup and social setting or circumstance or events for exhibitions.</li>
<li>Globalization The idea that societies around the globe are ending up increasingly coordinated and share various commonalties regardless of restricted articulations and signs.</li>
<li>Males _________ were required to provide labor for 40 days a year (reduce to 15 days a year in 1884)</li>
<li>La Solidaridad  The name of the newspaper whom Rizal, Del Pilar, Luna and others used to disseminate how the Spaniards oppressed Filipinos.</li>
<li>William H. Taft When we are placed under military government until 1901 he became the first civil governor, he was also the 27th president of the United States and the chosen successor of President Theodore Roosevelt.</li>
<li>Spanish The Central ____________ government introduced an educational decree fusing sectarian school run by the friars into a school called the Philippine Institute.</li>
<li>Tobacco The biggest of the state monopolies was__________, which began in 1781 and halted 1882.</li>
<li>Zinc  Zamboanga del Sur has gold, silver, lead, ______store.</li>
<li>Article I Article ____ stated, "You shall not kill, neither shall you steal, neither shall you do harm to the aged, lest you incur the danger of death. All those who infringe this order shall be condemned to death by being drowned in the river, or in boiling water".</li>
<li>Barsoain Church, Malolos, Bulacan The place where President Aguinaldo assembled the Revolutionary Congress on September 15, 1898.</li>
<li>Supreme Council of Grace and Justice  This type of constitution gives the authority to make decisions and sustain or disprove the sentences rendered by the other courts and to dictate rules for the administration of justice.</li>
<li>National Historical Commission  __________ is vault and caretaker of recorded reports, distributions, and authentic antiquities; recognizes huge chronicled figures, occasions, places; responsible for setting up and discussion of verifiable creators, landmarks, heraldry and other chronicled curios.</li>
<li>Historical resources  Historian's most important research tools are ___________.</li>
<li>Claro M. Recto  He was the president of the constitutional Convention in 1934 and he presided the opening session where they started the writing of the Philippine Constitution.</li>
<li>March 16, 1521  On the ___________, as they sailed in a westerly course from Ladrones, as they saw land towards the northwest; but owing to many shallow places they did not approach it.</li>
<li>Commonwealth  The 1935 constitution that govern the country is also called as the __________ constitution.</li>
<li>Ferdinand Magellan  He was the Portuguese explorer to circumnavigate the globe. In 1519.</li>
<li>Spanish The first 1897constitution of the Biak-na-Bato was written in what language?</li>
<li>Manuel L. Quezon  The chosen President of the Commonwealth government.</li>
<li>Federalista The Progresista Party also known as __________ Party.</li>
<li>Mariano Gomez, Jacinto Zamora and Jose Burgos GOMBURZA stands for _______________.</li>
<li>500 members How many members of Katipunan went to the first place on August 22, 1896, at the house and yard of Apolonio Samson.</li>
<li>House of Representatives  The only branch of the government which can initiate the impeachment of the president, members of the Supreme Court, and other constitutionally protected government officials such as the ombudsman is the __________________.</li>
<li>Magdalena Leones  She was one of the lesser-known World War II veterans. She was known as the only Asian woman to have been awarded the Silver Star Wolrd War by the United States.</li>
<li>Zubu  Magellan called Cebu ______.</li>
<li>Noli me Tangere Dr. Jose Rizal wrote this novel to expose evils of Spanish rule in the Philippines.</li>
<li>1984  According to Corazon Aquino's Speech she said," I held out for participation in the ________ election the dictatorship called, even if I knew it would be rigged. I was warned by the lawyers of the opposition, that I ran the grave risk of legitimizing the foregone results of elections that were clearly going to be fraudulent".</li>
<li>Rajah Bendahara Kalantiaw He is a mythical character who make the main lawful code in the Philippinesand it is said to be "The Code of Kalantiaw". In the Island of Negros he was the Chief.</li>
<li>Andres Bonifacio  He was one of the chief officers of Katipunan in 1895 and known as the President Supremo.</li>
<li>Sinicization  Since the extension of the Chinese individuals in the Han administration, Chinese individuals have selected down into Southeast Asia and added to the shocking changes of local Southeast Asian societies and the Philippine archipelago from the most recent hundred years BC to the present.</li>
<li>Urbana  __________ is a tax on the annual rental value of an urban real estate.</li>
<li>Industria __________ is a tax on salaries, dividends, and profits.</li>
<li>Con-Con In this method of changing the constitution happens when the congress needs upon a vote of two thirds of all its member and will file for a constitutional convention.</li>
<li>External Criticism  Is the practice of verifying the authenticity of evidence by examining its physical characteristics; consistency with the historical characteristics of the time when it was produced: and materials used for evidence.</li>
<li>Cedula or Tax Prominent Filipino Historian Teodoro Agoncillo emphasizes the event when Bonifacio tore the ___________________receipt before the katipuneros who also did the same.</li>
<li>60  The Mindanao State University is situated at Lanao's capital, Marawi City. Most pioneers in Mindanao are in certainty results of the MSU. ______ % of its best teachers are Christians Filipinos</li>
<li>Article IV  Article ____ stated, "Observe and obey; let no one disturb the quiet of the graves. When passing by the caves and trees where they are, give respect to them. He who does not observe this shall be killed by ants, or beaten to death with thorns".</li>
<li>August 23, 1896 Rizal wrote in his Memoirs of the Revolution that it happened at Pugadlawin on ___________.</li>
<li>Maranao The _________ are gathered in Lanao region. They involve the most vital place in Mindanao attributable to their entrance to Iligan narrows in the north and Illana cove in the south.</li>
<li>Jose P. Rizal ____________ is well-known as a hero of the revolution for his writing that center on ending colonialism and liberating Filipino minds to contribute to creating the Filipino nation.</li>
<li>Internal Criticism  Looks within the data itself to try to determine truth--facts and "reasonable" interpretation. It includes looking at the apparent or possible motives of the person providing the data.</li>
<li>Museum Pambata  _______ is advances workmanship and culture among youngsters through displays, addresses, workshops, gatherings on Philippine culture and different nations.</li>
<li>2 _____ % tax on entities with annual sales receipts of less than 5,200,000;6 their original state, price regulated petroleum products and fertilizers.</li>
<li>Melchora Aquino She was called as the Mother of the Revolution. She took care, provided food, and nurses the wounded Katipuneros in 1896.</li>
<li>Igorots This tribes are known to be rice-cultivators. They contain numerous clans that live in the Cordillera mountain ranges.</li>
<li>Political Caricature  It is also known as Editorial Cartoon that contain a commentary that express the artist opinion toward certain issues.</li>
<li>Manuel L. Quezon  He was known as the father of the commonwealth.</li>
<li>Sama  The ________ individuals have one dialect with numerous variety, for example, the vernacular of the Jama Mapun, and the Bangingi.</li>
<li>Unitary The current system of the Philippines is in the form of ________________.</li>
<li>Malong And Abaya  The whole regions of Lanao Del Sur, especially at the region of the lake are untouchable to outcasts. The way of life of the general population are in their conventional clothing, the _______ and the_______.</li>
<li>Jones Law In 1916, the US Congress passed the Philippine Autonomy Act, otherwise called the _________, giving the Philippines extensive home run and guaranteed freedom after the establishment of a steady government.</li>
<li>National Achieve  __________ storehouse and overseer of all reports and other authentic materials, and attempts their discussion and reclamation.</li>
<li>People's Initiative This method of changing the constitution happens when the amendments of the constitution is proposed by the people upon a petition of at least 12% of Philippine registered voters.</li>
<li>August 26, 1896 Valenzuela's account should be read with caution: He once told a Spanish investigator that the "Cry" happened in Balintawak on Wednesday ___________</li>
<li>7 days  Magellan remained __________ on Mazaua Island.</li>
<li>Teresa Magbanua She is known as the Visayan Joan of Arc. She joined the Katipunan's women chapter in Panay. She fought against Spain, the United States, and Japan.</li>
<li>Article XI  Article ____ stated, "These shall be burned: who by their strength or cunning have mocked at and escaped punishment or who have killed young boys; or try to steal away the women of the elders".</li>
<li>To be a good man, a person should be a person of power and words. Which of the following is not written in the Katipunan Code of Conduct?</li>
<li>Underwood-Simmons Tariff Act  1913, the _____________________ was passed, resulting in a reduction in the revenue of the government as export taxes levied on sugar, tobacco, hemp, and copra were lifted.</li>
<li>Federalism  This type of government is strongly supported by President Rodrigo RoaDuterte, where in the concern of this government is to distribute wealth of the country and should not focus only on the capital. It also states that the Philippines should share sovereignty and be divided into autonomous regions. This type of government is called ___________.</li>
<li>Ethnic  _________ is an Italian expression for country. An ethnic group might be characterized as inborn gathering which has its own particular dialect, hold in like manner an arrangement of custom unique in relation to others whom they are in contact.</li>
<li>July 7, 1892  Rizal's exile happened on ___________.</li>
<li>300 Magellan's expedition sighted a high land named ZAMAL Island which was some ______ leagues westward of Ladrones Island.</li>
<li>Government  According to Corazon Aquino's Speech she said, "The__________ sought to break him by indignities and terror".</li>
<li>July 2, 1892  La Liga Filipina was organized on __________.</li>
<li>Jose Montero y Vidal  _____________, a Spanish historian who documented the Cavite Mutiny event and his work centered on how the event was an attempt in overthrowing the Spanish Government in the Philippines.</li>
<li>Senior del Fresno The chief of firing squad who was assigned in Rizal's death row.</li>
<li>External Criticism  Applies "science to a document." It involves such physical and technical tests as dating of paper a document is written on, but it also involves a knowledge of when certain things existed or were possible, e.g. when zip codes were invented.*</li>
<li>National Defense Act  The national assembly order its first law, which accommodated the foundation of national resistance for the Philippines.</li>
<li>First Voyage Around The World Primo viaggiointorno al mondomeans ________.</li>
<li>Emilio Aguinaldo  ______________ commissioned a "Himno de Balintawak" to inspire the renewed struggle after the pact of the Biak-na-Bato failed.</li>
<li>Zubu  _________ was the port with the most trade.</li>
<li>Multi-culturalism and Pluralism This is an idea that progressive over many years of open discussion and battle the world over. The ascent of unconventional developments in the recently made states after World War II stay a standout amongst the most bothersome issues confronting the world. The goals of ethnic, religious and racial minorities have been verbalized in the different UN organizations on culture and training especially UNESCO.</li>
<li>Fr. Manuel Garcia The primary source from Rizal's retraction translated from the document found by_____________, C.M. on 18 may 1935</li>
<li>Secondary resources ________________ which were produced by an author who used primary sources to produce the material. In other words, this are historical sources, which studied a certain historical subject.</li>
<li>Lanao _________ is a land rich in writing. Darangan is a case of this. The presence of darangan authenticates the level of human progress that the Maranao have accomplished at a certain point.</li>
<li>Gen Antonio Luna  He is known as the hot tempered general who fought against the United States in the Spanish- American war.</li>
<li>Sinkil  This dance took its name from the rings worn on the lower legs of a Muslim princess. This dance relates the epic legend of the "Darangan" of the Maranao people of Mindanao.</li>
<li>Jose E. Marco In 1913, ____________ book "Las AntiguasLeyendas de la Isla de Negros" recognized the code to historical fiction.</li>
<li>Constitutional  According to Corazon Aquino's Speech she said," Now, we are restoring full ____________ government"</li>
<li>Antonio Pigafetta He was a young Italian nobleman who had joined the expedition and a good servant and assistant to Ferdinand Magellan during the expedition in Seville, Spain.</li>
<li>Books The following are classified as the Primary resources EXCEPT.</li>
<li>9°54'N  It must be considered that in Albo's Version, the location of Mazava fits the location of the island of Limasawa, at the southern tip of Leyte, _______.</li>
<li>Adat  ________ is the whole of both pre-Islamic culture and the philosophical understanding of the Muslims on the lessons of Islam.</li>
<li>America Cory Aquino ended her speech by thanking the __________ for serving as home to her family and joined America in building the Philippines as a new home for democracy.</li>
<li>Butuan  _____________ is riverine settlement.</li>
<li>Primary sources ______________ are usually defined as first-hand information or data that is generated by witnesses or participants in past events.</li>
<li>Ninoy Aquino  _____________________ became the pleasing sacrifice that answered their prayers for freedom.</li>
<li>White triangle  This symbol in the Philippine flag represents the distinctive symbol of Katipunan Society, which by means of its compact of blood urged on the masses of the people to insurrection.</li>
<li>Maragtas  The Code of Kalantiaw is said to be a mythical authentic code in the acclaimed epic story of____________.</li>
<li>External Criticism  Form and appearance and more particularly to question of authorship and textual circumstances such as time, place and purpose.</li>
<li>1988  The VAT laws was signed in 1986 and put to effect in__________.</li>
<li>NARRA This improved the government's relocation program and dissemination of agricultural lands to landless tenants and agrarians during the time of President Quirino.</li>
<li>Age of Exploration  ___________ is a period of competition among European rulers to conquer and colonize land outside their original territory.</li>
<li>Internal Criticism  Sometimes called as "higher criticism"</li>
<li>Emilio Aguinaldo  In 1896 he became the mayor of Cavite Viejo and was declared as the first president of the Philippines.</li>
<li>February 14, 1897 Few months after execution _________ from anonymous writer but later on revealed to be Fr. Vicente Balaguer.</li>
<li>Bayani  Their outfits were red masks with white triangles and with maroon sash.</li>
<li>Commission on Higher Education  ________ is directs the instructing of Philippine culture in the schools and colleges, preparing of educators.</li>
<li>Supreme Council This organ of the constitution was headed by the president and has four department secretaries, this give the power such as: interior, foreign affairs, treasury, and war.</li>
<li>10,000  Income tax rates were increased in 1936, adding a surtax rate on individual net income in excess of __________ pesos.</li>
<li>March 14, 1947  One of the most noteworthy of these bargain in the Philippine-American MBA which marked on __________, just months after the affirmation of Philippine autonomy by the US.</li>
<li>Mactan  Magellan died in __________.</li>
<li>Andres Bonifacio  The Filipino revolutionary hero who founded the Kataastaasang Kagalangalangang Katipunan ng mga Anak ng Bayan (KKK). He was known as the first one who has a clear vision of what a Filipino nation should be.</li>
<li>Article V Article ____ stated, "You shall obey; he who exchanges for food, let it be always done in accordance with his word. He who does not comply, shall be beaten for one hour, he who repeats the offense shall be exposed for one day among ants".</li>
<li>Cry of Rebellion  The phrase "El Grito de Rebelion" means ____________.</li>
<li>August 30, 1951 To complement and further strengthen the 1947 MBA, the Philippines and the US concludes a MDT on _________.</li>
<li>Abraham Lincoln In Corazon Aquino's speech she quoted, "Like_______________, I understand that force may be necessary before mercy. Like Lincoln, I don't relish it. Yet, I will do whatever it takes to defend the integrity and freedom of my country".</li>
<li>Pigafetta's journal What was the first voyage according to Cachey Jr's The First Voyage around the World?</li>
<li>Information visited by or experienced by a traveler Based on the text you have read what is a travelogue?</li>
<li>Historia  History came from the Greek word ________ which means to search, look into.</li>
<li>Legends and Arts  The history or story of a society or group of people is rooted from their ________, EXCEPT.</li>
<li>Secondary Sources Are historical sources, which studied a certain historical subject.</li>
<li>June 12, 1898 The Philippine declaration was proclaimed on ___________________ at the Cavite el Viejo.</li>
<li>History _________ is a brief summary or result based on a factual research and it also deals with the sequence of important events that is stated in the history.</li>
<li>Islas de los Ladrones The "Island of thieves" is also called as ____________________.</li>
<li>Primary Sources Are characterized not by their format but rather by the information they convey and their relationship to the research question. They include letters, diaries, journals, newspapers, photographs, and other immediate accounts. The interpretation and evaluation of these sources becomes the basis for research.</li>
<li>Manga Aral Nang Katipunan The original title of Kartilya ng Katipunan was ___________.</li>
<li>Museong Pambata This museum features hands-on experience that encourage children to explore while playing.</li>
<li>Anak ng Bayan What was the password used for the codes of "Katipon"?</li>
<li>Manila, Cavite, Bulacan, Pampanga, Nueva Ecija, Bataan, Laguna and Batangas The eight raises of the sun the Philippine flag symbolizes the 8 provinces of:</li>
<li>DEMOCRACY Wherever Corazon Aquino went in the campaign, slum area or impoverished village. They came to her with one cry,______________.</li>
<li>President Reagan  When Pres. Corazon Aquino met with________________, they began an important dialogue about cooperation and the strengthening of friendship between our two countries.</li>
<li>Alfred McCoy  The author of Philippine Cartoons: Political Caricature of the American Era (1900-1941).</li>
<li>Outsourcing When businesses want to manufacture their products at a cheaper rate, they employ the services from developing countries which is possible in countries such as China and Cambodia, where manufacturing costs and wages are lower than highly developed countries. This business practice is called ____________.</li>
<li>Human capital What attribute of a global city refers to having a storehouse of smart, educated, creative people?</li>
<li>Understand different cultures McDonald's marketing has different strategy in different regions. Even in Asia, the advertising content for each country is different. For example, in Japan, most Japanese have high preferences on animations and the animation in Japan is the fastest growing industry as well. So McDonald's tends to use more animation elements for marketing and advertising. It aims to attract more target customers, including kids, teenagers, and even young adults. Many well-known cartoons were used in McDonald's advertisement marketing that enhances the attractiveness and popularity of products. In Malaysia, the Halal logo are indicated in all kinds of Halal food advertising. It also emphasizes on good values with draw attentions of local customs. The customs in different areas presents diversity. McDonald's also considered the local eating habits to practice the different marketing strategies. For example, many Chinese people choose Chinese food for breakfast, McDonald's launched a Chinese-style breakfast based on the eating habits (Li, 2016). What attribute of global corporations does McDonald's practice?</li>
<li>Sustainable Development The development of our world today by using the earth's resources and the preservation of such sources for the future is called</li>
<li>The founding of the World Trade Organization (WTO)  Which of the following examples refers to political factor influencing economic globalization?</li>
<li>Neoliberals ________ see the effort of environmentalists as serious impediments to trade</li>
<li>Educational Planning  This is one of the importance of demography that is concerned with the youth and providing them this basic right for schooling</li>
<li>Religion  What is a system of beliefs, rituals, and practices, usually institutionalized in one manner or another, which connects this world with the beyond and provides the bridge that allows humans to approach the divine, the universal life force that both encompasses and transcends the world?</li>
<li>Media The term _______ comes from the word medium which is defined as channel, means, or method:</li>
<li>According to McLuhan, the world was entering a fourth ''age'' he called the iron age, where people everywhere would be able to find and experience the same information through technological tools.  Which of the following statements is not true?</li>
<li>Gulf Cooperation Council  It is a political and economic alliance of six countries in the Arabian Peninsula: Bahrain, Kuwait, Oman, Qatar, Saudi Arabia and the United Arab Emirates:</li>
<li>The correct answer is 'True'. One of the downsides of globalization is the inverted relationship of population growth and the availability of resources.</li>
<li>Capitalism  Economic globalization is the increasing economic interdependence of national economies across the world through a rapid increase in cross-border movement of goods, service, technology, and capital. Some sociologists, like William I. Robinson has argued that because a capitalist economy is premised on growth and expansion, a globalized economy is the inevitable result of ________________.</li>
<li>All of the choices. Which of the following statements is true about the effects of globalization?</li>
<li>Uniform regions These regions are also called formal regions some trait is shared with relative uniformity across the space.</li>
<li>Nodal regions also called perceptual regions, based around some central point or node; typically circular with fading boundaries. Which of the following statements is not true?</li>
<li>Right Identify if the following is a right or responsibility: Having Education</li>
<li>Elderly Dependency Rate This the ratio between the elderly population and the working age (15-64 years)</li>
<li>Transnational corporation The rise of global cities has been linked with the expansion of the role of TNCs in global production patterns. TNC stands for:</li>
<li>The South is comprised of countries with developing economies which were initially referred to as Second World countries during the Cold War. Which of the following statements is not true?</li>
<li>Population ageing The phenomenon wherein fertility declines and life expectancy rises, the proportion of the population above a certain age rises as well:</li>
<li>The correct answer is 'False'.  The solutions to the problems of globalization is dependent on its citizens</li>
<li>Core  In his book, The Modern World System, American sociologist Immanuel Wallerstein described high-income nations as the ____ of the world economy.</li>
<li>Fair Trade  This is aims at a more moral and equitable global economic system whereby price is not set by the market rather it is transparently negotiated by both producers and consumers</li>
<li>Digital media This form of media is also known as new media, consisting of contents that are organized and distributed on digital platforms:</li>
<li>Research Design Which of the following is NOT a part of the Body of the research paper?</li>
<li>Government  A group of people who has the ultimate authority to act on behalf of a state is called:</li>
<li>Population Projection This provide a basis for other statistical projections, helping governments in their decision making and it is measured in terms of annual growth rate and in thousands of people</li>
<li>Japan Aside from South Korea, the only Asian country belonging to the First World category is:</li>
<li>Church  A religious organization that claims to possess the truth about salvation exclusively wherein membership is by childbirth: new generations are born into the church and are formally inducted through baptism:</li>
<li>The correct answer is 'False'.  It is impossible to transfer the idea of global citizenship at a global level</li>
<li>North-South Divide  It is a socio-economic and political divide of countries, comprising the three worlds known as First, Second, and Third Worlds.</li>
<li>Responsibility  Identify if the following is a right or responsibility: Paying Taxes</li>
<li>August 1990 When did the UN Security Council decided on comprehensive and mandatory sanctions, for the first time in the past 22 years against Iraq's invasion of Kuwait?</li>
<li>Item life cycle What is the timeframe over which a product is created, passed on to exhibit, and over the long run removed from the world market?</li>
<li>The correct answer is 'True'. Global Security should be a priority for all countries regardless if it is developed or less developed</li>
<li>Turbo-charged by the internet Long before Airbnb persuaded strangers to sleep in one another's homes and became a $25 billion company, it was just an idea to make extra bucks and make rent. It started with an email. Joe Gebbia sent his roommate, Brian Chesky, an idea: What if they made a designer's bed and breakfast, complete with a sleeping mat and breakfast? It was a way to "make a few bucks." Almost nine years later that idea is worth $25 billion. They created a simple site, airbedandbreakfast.com, and bought three air mattresses. The duo had met at college at the Rhode Island School of Design, so they thought acting as tour guides to designers would be a fun way to make money. By 2011, four years after the first air mattress guests, Airbnb was already in 89 countries and had hit 1 million nights booked on the platform. It also finally won the break-out mobile app award at SXSW - despite having tried to launch there three years earlier (Carson, 2016). What attribute of global corporations contributed to the success of Airbnb?</li>
<li>Judaism It is the complex phenomenon of a total way of life for the Jewish people, comprising theology, law, and innumerable cultural traditions:</li>
<li>Free Trade  ________ is associated with environmental damage but it also puts emphasis on the expansion of manufacturing,</li>
<li>Civil society This includes private economy, educational institutions, churches, hospitals, fraternal organizations, and other non-profit organizations:</li>
<li>Third World The term ______ is often used as shorthand for poor or developing nations.</li>
<li>Planning for Food Supply  This is one of the importances of demography that is concerned with providing basic needs of people as more and more are experiencing inadequacies in this basic need.</li>
<li>The correct answer is 'False'.  Innovations have been in phenomenal in the past centuries and all of these have been advantageous to humans, society and the world</li>
<li>UN General Assembly 1989  The UN Convention on the Rights of the Child is a comprehensive, internationally binding agreement on the rights of children, a human rights treaty which sets out the civil, political, economic, social, health and cultural rights of children. When was the treaty adopted by the United Nations?</li>
<li>Multilateral Development Banks  The term international financial institution typically refers to the International Monetary Fund, the World Bank Group, the African Development Bank, the Asian Development Bank, the Inter-American Development Bank, and the European Bank for Reconstruction and Development. The last five banks are considered MDBs. What does MDBs stand for?</li>
<li>Institution The decision, the conflict, and the resolution of that conflict are done through the ______ of the government established and codified in that particular state, whether or not through elections:</li>
<li>Industrial Revolution Economic Development was hastened by</li>
<li>Prophet In the Islam religion, Jesus is considered a ______.</li>
<li>Fourth World  What was coined to refer to ethnically or religiously defined populations living within or across national boundaries, nations without a sovereign state, and indigenous groups that are nomadic, uncontacted or living outside of global society?</li>
<li>Europe  What area has the greatest percentage of population aged 60 or over</li>
<li>Global city It is an urban center that enjoys significant competitive advantages and that serves as a hub within a globalized economic system:</li>
<li>Regional organizations  These organizations were established to link together geographically and ideologically related states:</li>
<li>BIMSTEC It is a regional organization comprising seven member states lying in the littoral and adjacent areas of the Bay of Bengal constituting a contiguous regional unity:</li>
<li>Global village  What is the term coined by Marshall McLuhan which describes the phenomenon of the world's culture shrinking and expanding at the same time due to pervasive technological advances that allow for instantaneous sharing of culture?</li>
<li>Outsourcing Many American companies are now transferring technology development, customer service, financial and administrative jobs to international markets. India is the leading recipient of the outsourcing of information technology functions like software development and maintenance, and also BPOs. The latter includes back-office functions like accounting, human resources, call centers and data analysis (DiCarlo, 2003). The practice of farming out jobs from a home base to other countries, largely in an effort to cut costs is called:</li>
<li>Way of life The level of riches, comfort, material merchandise, cash and necessities accessible to a specific financial class in a specific region is called:</li>
<li>Democracy This is one of the progressive values/forces that are considered as products of globalization that is about the freedom and rights of a nation's citizens</li>
<li>Trade Protectionism This is an approach to global economic resistance which is defined as a deliberate attempt to intervene in foreign trade by putting up barriers to trade</li>
<li>Grant financing This type of financing is provided by the Multilateral Development Banks to member countries, mostly for technical assistance, advisory services, or project preparation:</li>
<li>APEC  It is a regional economic forum established in 1989 to leverage the growing interdependence of the Asia-Pacific and its 21 members aim to create greater prosperity for the people of the region by promoting balanced, inclusive, sustainable, innovative and secure growth and by accelerating regional economic integration:</li>
<li>Health Planning This is one of the importance of social demography that is concerned with the welfare specifically of the mother and child, specially the problem faced of mothers during pregnancy which is malnutrition</li>
<li>New Zealand and Australia In the distinct socio-economic and political categorization of countries, which countries in the southern hemisphere are labeled part of the North?</li>
<li>Housing Planning  This is one of the importance of demography that is concerned with providing the growing number of population which has a direct impact on the increase for the need for shelter</li>
<li>Pull factor These are factors in the destination country that attract the individual or group to leave their home because of the opportunities presented in the new location were not available to them previously:</li>
<li>Christianity  It is currently the world's largest religious group stemming from the life, teachings, and death of Jesus of Nazareth in the 1st century AD:</li>
<li>Irregular migrants  People who enter a country, usually in search of employment, without the necessary documents and permits:</li>
<li>Media are a vehicle for cultural expression and cultural incoherence within and between nations.  Which of the following statements is not true?</li>
<li>Media culture This refers to industrial culture, organized on the model of mass production and is produced for a mass audience according to types (genres), following conventional formulas, codes, and rules.</li>
<li>Awakened One  The term Buddha is a Sanskrit word which means:</li>
<li>Statement of the Problem  Which of the following is NOT a part of the methods of the research paper?</li>
<li>Cultural imperialism  What takes place when a country dominates others through its media exports, including advertising messages, films, and television and radio programming?</li>
<li>Child labor deprives children of their childhood. The 2016 Global Estimates of Child Labour indicate that one-fifth of all African children are involved in child labour, a proportion more than twice as high as in any other region. Nine per cent of African children are in hazardous work, again highest of all the world's regions. Africa has the largest number of child labourers; 72.1 million African children are estimated to be in child labour and 31.5 million in hazardous work (International Labour Organization, 2017). The statement means that:</li>
<li>International migration A type of migration which refers to territorial relocation of people between nation-states:</li>
<li>Improved Survival Rate and High Fertility Rate  What are the two factors identified to be contributors to the increase in population?</li>
<li>Watchdog  The term used to describe the role of media in promoting transparency in public life and public scrutiny of those with power through exposing corruption, maladministration and corporate wrong-doing:</li>
<li>Second World  What was the term used to describe several industrial countries and majority of these countries either practiced a socialistic system of government or a communist system of government?</li>
<li>Sociological  Social media has become a ubiquitous part of daily life, but this growth and evolution has been in the works since the late 70s. From primitive days of newsgroups, listservs and the introduction of early chat rooms, social media has changed the way we communicate, gather and share information, and given rise to a connected global society (Morrison, 2015). This evolution of social media is what aspect of globalization?</li>
<li>The correct answer is 'False'.  One of the benefits of globalization is the eradication of global inequality</li>
<li>Recreational  Which of the following does not belong to the four pillars of urban life?</li>
<li>Total Fertility Rate  This is the total number of children that would be born to each woman if she were to live to the end of her child-bearing year</li>
<li>The correct answer is 'True'. Humans treatment of resources as exhaustible will cause long term problems for the future generation</li>
<li>The "three worlds" model of geopolitics first arose in the mid-18th century as a way of mapping the various players in the Cold War.  Which of the following statements is not true?</li>
<li>Japan Since joining the world body in 1956, this country has all along positioned cooperation with the United Nations as a major pillar of its diplomacy. It has cooperated in UN activities in a wide range of areas, making the second largest financial contributions among the member States next only to the United States:</li>
<li>Eradicate extreme hunger and poverty  The Millennium Development Goals were the eight international development goals created by the United Nations for the year 2015 to address the different problems in the world. Which of the following ranked first in the eight development goals?</li>
<li>Geography It is the statistical study of human populations:</li>
<li>The correct answer is 'True'. Global inequality is one of the downside of innovations</li>
<li>Security Council  The United Nations came into being in 1945, following the devastation of the Second World War, with one central mission: the maintenance of international peace and security. The United Nations is responsible for maintaining ceasefires and stabilizing situations on the ground, providing crucial support for political efforts to resolve conflict by peaceful means. Those missions consisted of unarmed military observers and lightly armed troops with primarily monitoring, reporting and confidence-building roles. Which unit of the United Nations is responsible for these efforts?</li>
<li>The correct answer is 'False'.  Trade protectionism is in line with the principles of free trade by the neoliberalists</li>
<li>Uniform regions These regions are also called formal regions wherein some trait is shared with relative uniformity across the space.</li>
<li>Poverty line  The level of personal or family income below which one is classified as poor according to governmental standards:</li>
<li>Committee on International Assistance and Verification  Conflicts in Central America made major progress toward a peaceful settlement, thanks to an active role played by the United Nations. A general election was held on February 25, 1990. What was the name of the committee established by UN in response to a request by Central American countries, which started its activity to ensure the dissolution and repatriation of the anti-government guerrillas?</li>
<li>Political The European Union grew out of a desire for peace in a war-torn and divided continent. Five years after World War II ended, France and Germany came up with a plan to ensure their two countries would never go to war against each other again. The result was a deal signed by six nations to pool their coal and steel resources in 1950. Seven years later a treaty signed in Rome created the European Economic Community (EEC) - the foundations of today's European Union. The UK was one of three new members to join in the first wave of expansion in 1973. Today the EU has 28 member states with a total population of more than 500 million (bbc.com). The founding of the European Union is influenced by what aspect of globalization?</li>
<li>Economic regionalism  What is the institutional arrangements designed to facilitate the free flow of goods and services and to coordinate foreign economic policies between countries in the same geographic region?</li>
<li>Homogenous regionalism is institutional arrangements designed to facilitate the free flow of goods and services and to coordinate foreign economic policies between countries in the same geographic region.  Which of the following statements is not true?</li>
<li>Europeans traveled around the globe to barter crafts and furs in exchange for silks and perfumes in the Middle Ages Which of the following examples refers to historical factor influencing economic globalization?</li>
<li>Allah He is viewed as the sole God-creator, sustainer, and restorer of the world in the Islam religion:</li>
<li>Cultural  Korean Pop music or more famously known as K-pop has become a truly global phenomenon because of its distinctive blend of addictive melodies, slick choreography and production values, and an endless parade of attractive South Korean performers who spend years in grueling studio systems learning to sing and dance in synchronized perfection. Aside from the music, K-pop has also influenced the global audience in terms of fashion, movies, dramas, and cuisine. K-pop has been building for two decades, but K-pop in particular has become increasingly visible to global audiences in the past five to 10 years. South Korean artists have hit the Billboard Hot 100 chart at least eight times since the Wonder Girls first cracked it in 2009 with their crossover hit "Nobody" - released in four different languages, including English - and the export of K-pop has ballooned South Korea's music industry to an impressive $5 billion industry. K-pop is what aspect of globalization?</li>
<li>Employment Planning This is one of the importance of demography that is concerned with creating a plan of action in providing job security for people.</li>
<li>Reducing Trade Barrier  This is one of the identified way to reduce economic marginalization of people and nations</li>
<li>Long-term loans This type of financing is provided by Multilateral Development Banks to member countries, with maturities of up to 20 years, based on market interest rates. The financial resources for these loans are obtained by borrowing on the international capital markets and re-lend to borrowing governments in developing countries:</li>
<li>Growth rate The annual changes in population resulting from births, deaths and net migration during the year:</li>
<li>Islam The religion which was promulgated by the Prophet Muhammed in Arabia in the 7th century CE.</li>
<li>A pull factor refers to conditions which force people to leave their homes. Which of the following statements is not true?</li>
<li>Cold War  Dividing the countries in two hemispheres originated in which period?</li>
<li>International Financial Institutions  These institutions provide financial support and professional advice for economic and social development activities in developing countries and promote international economic cooperation and stability:</li>
<li>Buddhism  The five largest religions in the world are Hinduism, Islam, Christianity, Judaism, and:</li>
<li>Political The United Nations came into being in 1945, following the devastation of the Second World War, with one central mission: the maintenance of international peace and security. The UN does this by working to prevent conflict; helping parties in conflict make peace; peacekeeping; and creating the conditions to allow peace to hold and flourish. What aspect of globalization deals with the establishment of UN in order to maintain international peace and security?</li>
<li>United States of America, Germany, Canada, the United Kingdom, Australia and the Russian Federation According to UN, the following countries are projected to be the top net receivers of international migrants (more than 100,000 annually) between 2015 and 2050:</li>
<li>Imperialism Britain, France, Germany, Russia, Netherlands, Japan, and the United States colonized countries and spread their empires. These nations have created global economic, political, cultural, and social connections around the world. The extending of a country's power and influence is called:</li>
<li>The correct answer is 'True'. Environmental degradation comes with globalization</li>
<li>Citizenship This is one of the identified reasons why</li>
<li>Measure success Philip Morris International is an American cigarette and tobacco company which sells its products in 180 countries outside the United States. In the Forbes Global 2000 List, it grabbed the top spot with foreign revenue unsurprisingly accounting for 100 percent of total revenue, considering that it sells its products exclusively overseas. What attribute of global corporations does Philip Morris International employ?</li>
<li>Responsibility  Identify if the following is a right or responsibility: Allegiance to the nation</li>
<li>Print media A form of media consisting of paper and ink, reproduced in a printing process that is traditionally mechanical:</li>
<li>Globalization is a recent phenomenon which traces its origin in the Information Age and thrived because of the presence of social media and new technologies. The following statements are correct about globalization except for the following:</li>
<li>Population  This refers to all nationals present in, or temporarily absent from a country, and aliens permanently settled in a country. This indicator shows the number of people that usually live in an area:</li>
<li>Peace This is one of the progressive values/forces that are considered as products of globalization that is about creating an environment of harmonious relationship of the citizens and the government of a nation</li>
<li>North-South Divide  What is the distinct socio-economic and political categorization of countries comprising the three worlds known as First, Second, and Third Worlds?</li>
<li>Summary of Results  Which of the following is a part of the discussions?</li>
<li>The Arab League is a regional intergovernmental organization, which main goal is maintaining cooperation on political, economic, environmental, humanitarian, cultural and other issues between a number of former Soviet Republics.  Which of the following statements is not true?</li>
<li>Environmentalist  _____________argue that environmental issues should be given priority over economic issues</li>
<li>Data Presentation Which of the following is a part of the results?</li>
<li>Child labor The work that deprives children of their childhood, their potential and their dignity, and that is harmful to physical and mental development is called:</li>
<li>China The most populous country in the world today is:</li>
<li>Alfred Sauvy  Who introduced the "three worlds" model wherein the First World included the United States and its capitalist allies in places such as Western Europe, Japan and Australia; the Second World consisted of the communist Soviet Union and its Eastern European satellites; and the Third World encompassed all the other countries that were not actively aligned with either side in the Cold War?</li>
<li>Growth Rate This refers to the annual changes in population resulting from births, deaths and net migration during the year</li>
<li>External intervention One of the traditional challenges of a country is an invasion of other countries, which is also called:</li>
<li>Regionalism It is the proneness of the governments and peoples of two or more states to establish voluntary associations and to pool together resources in order to create common functional and institutional arrangements and a process occurring in a given geographical region by which different types of actors come to share certain fundamental values and norms:</li>
<li>Church  Membership in this religious organization is by childbirth wherein new generations are born into it and are formally inducted through baptism:</li>
<li>Cultural  Dabbing, or the dab, is a simple dance move in which a person drops the head into the bent crook of a slanted arm, typically while raising the opposite arm in a parallel direction but out straight; both arms are pointed to the side and at an upward angle. Since 2015, it has also been used as a gesture of triumph or playfulness, becoming a youthful American dance fad and Internet meme (Ducey, 2015). Since the trend has gone viral, young Filipinos also picked it up as a playful pose. The dab fad in the Philippines is what aspect of globalization?</li>
<li>Elderly population  This refers to the group of population who are aged 65 years old and above</li>
<li>Autonomy  This is one of the progressive values/forces that are considered as products of globalization that is about the independence of nations</li>
<li>Mao Zedong  Who theorized that the 1st World was composed of the "superpowers" - US, Soviet Union, etc; the 2nd World was composed of lesser powers; and the 3rd World was composed of post-colonial emerging markets?</li>
<li>The correct answer is 'False'.  Due to technological innovations, particularly in science and technology, we will not have problems in catching up with much needed resources to survive</li>
<li>The high costs of and the risks associated with long voyages did not limit trade to a relatively small set of commodities of high value relative to their weight and bulk.  Which of the following is not true about the history of global market integration?</li>
<li>Regionalization It is a continuing process of forming regions as geopolitical units, as organized political cooperation within a particular group of states, and/or as regional communities such as pluralistic security communities:</li>
<li>The correct answer is 'False'.  Globalization takes a linear approach to thinking and has been a contributor in bringing peace to various nations.</li>
<li>Population  This refers to all nationals present in, or temporarily absent from a country, and aliens permanently settled in a country</li>
<li>Membership in the regional development banks is limited to countries from the region. Which of the following statements is not true?</li>
<li>Global Security This means delivering sufficient food to the entire world population</li>
<li>Carefully chosen international partners Nike and Apple's "Nike+" is a co-branding collaboration which started as as a way to bring music from Apple to Nike customers' workouts using the power of technology: Nike+iPod created fitness trackers and sneakers and clothing that tracked activity while connecting people to their tunes. It's a genius co-branding move that helps both parties provide a better experience to customers - and with the popularity of fitness tracking technology, Nike+ is ahead of the curve by making it easy for athletes to track while they play. What attribute of global corporations do Nike and Apple employ?</li>
<li>8 BIllion It is estimated that around 2050, the world requires to feed around __________people</li>
<li>Developing country  What term is alternatively used to refer to Third World countries?</li>
<li>Right Identify if the following is a right or responsibility: Freedom of Speech</li>
<li>The correct answer is 'False'.  The relationship between globalization and sustainability is multi-dimensional ---it involves economic, political and socials aspects</li>
<li>Review of Related Literature  Which of the following is NOT part of the Preliminary Pages?</li>
<li>The correct answer is 'False'.  Efforts to counter the effect of climate change have the full support of governments and corporations</li>
<li>Namibia In January 1989, the UN Security Council passed a resolution to implement in April the resolution to establish the UN Transition Assistance Group (UNTAG) and called for material and personnel support from member countries. In November, a constitutional assembly election was held under observation of the UNTAG. As a result, this country became independent in March 1990 and joined the United Nations in April:</li>
<li>The correct answer is 'True'. Experts believe that technological innovations can sustain a growing economy</li>
<li>With regard the skepticism surrounding global media, international communication argues that global media are in fact best described as Eastern media, at most of global scope. Which of the following statements is not true?</li>
<li>The correct answer is 'True'. Global Citizens may be considered as a new breed of people who can travel across and within various boundaries</li>
<li>Marshall McLuhan  Who coined the term "global village" which describes the phenomenon of the world's culture shrinking and expanding at the same time due to pervasive technological advances that allow for instantaneous sharing of culture?</li>
<li>The founding of the Association of Southeast Asian Nations (ASEAN)  Which of the following examples does not refer to resources and markets as factors affecting economic globalization</li>
<li>South Asian Association for Regional Cooperation  The SAARC comprises of eight Member States: Afghanistan, Bangladesh, Bhutan, India, Maldives, Nepal, Pakistan and Sri Lanka. SAARC stands for:</li>
<li>Helping the bottom billion  This sees that increasing aid is one of the many measures that are needed and that needs should be adapted in the international norms and standards.</li>
<li>Right and Responsibility  Identify if the following is a right or responsibility: Voting</li>
<li>Third World What is the shorthand term used to describe for poor or developing nations?</li>
<li>China What is the top most populous country in the world according to Time</li>
<li>Gulf Cooperation Council  Which of the following does not belong among the regional organizations in the Western Hemisphere?</li>
<li>Right Identify if the following is a right or responsibility: Having privacy and security</li>
<li>Item life cycle _____ is the timeframe over which a thing is created, passed on to exhibit, and over the long run removed from the world market.</li>
<li>China, Korea, Japan ASEAN +3 is a forum that functions as a coordinator of co-operation between the Association of Southeast Asian Nations and three other nations namely:</li>
<li>Value opportunity to expand KFC was founded by Colonel Harland Sanders, an entrepreneur who began selling fried chicken from his roadside restaurant in Corbin, Kentucky during the Great Depression. Sanders identified the potential of the restaurant franchising concept, and the first "Kentucky Fried Chicken" franchise opened in Utah in 1952. By 1963, Sanders was fielding franchise requests without having to put in the legwork, and had more than 600 restaurants across the US and Canada selling Kentucky Fried Chicken. Years later, Kentucky Fried Chicken would establish its own restaurants around the world, and the rest is history. The success of KFC as a business is what attribute of global corporations?</li>
<li>Mao Zedong  Who theorized that the 1st World was composed of the "superpowers" - US, Soviet Union, etc; the 2nd World was composed of lesser powers; and the 3rd World was composed of post-colonial emerging markets.</li>
<li>Imperialism Britain, France, Germany, Russia, Netherlands, Japan, and the United States colonized countries spread their empires. These nations have created global economic, political, cultural, and social connections around the world. The extending of a country's power and influence is called:</li>
<li>Internationalism  An ideology that is similarly geared towards a decrease of international barriers but with the aim of the economic betterment of the planet in mind, not the perpetuation of power and privilege in the hands of the western dominated economies:</li>
<li>Global Citizenship  This can be defined "as a moral and ethical disposition that can guide the understanding of individuals or groups of local and global contexts, and remind them of their relative responsibilities within various communities."</li>
<li>Extreme poverty The United Nations defines _____ as a condition characterized by severe deprivation of basic human needs including food, safe drinking water, sanitation facilities, health, shelter, education and information.</li>
<li>Telegraph Rapid expansion of global communications can be traced back to the mechanical advancements of technologies during the 18th/19th centuries, which began with the invention of the _______ in 1837:</li>
<li>Abstract  Which of the following is a part of the Preliminary Pages?</li>
<li>Cult  A non-traditional form of religion, the doctrine of which is taken from diverse sources, either from non-traditional sources or local narratives or an amalgamation of both, whose members constitute either a loosely knit group or an exclusive group, which emphasizes the belief in the divine element within the individual, and whose teachings are derived from either a real or legendary figure, the purpose of which is to aid the individual in the full realization of his or her spiritual powers and/or union with the Divine:</li>
<li>The correct answer is 'True'. Resistance to globalization is multiple, complex, contradictory and ambiguous</li>
<li>Social  Which of the following is NOT a multi dimensional factor of globalization and sustainability</li>
<li>The semi-periphery of the world economy is the manufacturing base of the planet.  Based on the Modern World System of Immanuel Wallerstein, which of the following statements is incorrect?</li>
<li>Efficiency  This refers to finding the fastest possible way of producing large amounts of a certain product or achieving more in less possible time</li>
<li>Globalization is a recent phenomenon which traces its origin in the Information Age and thrived because of the presence of social media and new technologies. Which of the following statements is not true about globalization?</li>
<li>Vernacular regions  These regions are also called perceptual regions which are often based around a common cultural characteristic:</li>
<li>Eradicate extreme poverty and hunger  Among the eight Millennium Development Goals created by the United Nations in the 1990's, which ranked first?</li>
<li>Religion  Which of the following is not considered a reason why people move across international borders:</li>
<li>The correct answer is 'False'.  Citizens of a country entails him/her rights and privileges but no responsibility</li>
<li>Right Identify if the following is a right or responsibility: Having Protection from the government</li>
<li>Globalization brings a culture of monism, meaning religions "with overlapping but distinctive ethics and interests" interact with one another.  Which of the following statements is not true?</li>
<li>Trade Protectionism This involves systematic government intervention in foreign trade through tariffs and non- tariffs barriers in order to encourage domestic producers and deter their foreign competitors.</li>
<li>Understand different cultures With around 20,000 stores in 63 countries, Starbucks, the world's most popular coffee house has made its mark from Brazil to China, where many thought it would fail to take off due to the cultural importance of tea drinking. The company has gone to great lengths to make sure that every Starbucks feels like a local coffee house, without losing brand consistency. For example, in China, a regional dislike for coffee was combatted with coffee-free drinks, whilst stores in Asia feature more adaptable seating arrangements to cater for larger groups. This effort is what attribute of a global corporation?</li>
<li>Internal migration  A type of migration which refers to a move from one area (a province, district or municipality) to another within one country:</li>
<li>20-50%  According to Albert Subbloie, CEO and Founder of Tangoe, a good benchmark of whether your company should continue efforts in a country is when _______ percent of your business is coming from outside the United States.</li>
<li>Formed as a "club" of nation states, the North Atlantic Treaty Organization took some time to find out that cooperation with regional organizations might be of some use in improving social and economic living conditions as well as maintaining international peace and security and safeguarding the enjoyment of human rights. Which of the following statements is not true?</li>
<li>Sect  A religious organization requiring a high level of commitment and activity wherein members are expected to support its teachings and to comply with its lifestyle, which may be strict and ascetic:</li>
<li>Highly skilled and business migrants  People with qualifications as managers, executives, professionals, technicians or similar, who move within the internal labor markets of trans-national corporations and international organizations, or who seek employment through international labor markets for scarce skills:</li>
<li>Citizenship This pertains to legal relationship between a state and a person.</li>
<li>Companies that invest in the internet and produce web-based products are more unlikely to grow globally because there is more money involved in their international expansion.  Which of the following is not true about the attributes of global corporations?</li>
<li>The correct answer is 'True'. A movement from individuals, groups and organizations who are oppressed by globalization will rise as they seek a more democratic process of globalization</li>
<li>Regionalism It is the proneness of the governments and peoples of two or more states to establish voluntary associations and to pool together resources in order to create common functional and institutional arrangements and a process occurring in a given geographical region by which different types of actors come to share certain fundamental values and norms.</li>
<li>Broadcast media A form of media, such as radio and television, that reach target audiences using airwaves as the transmission medium:</li>
<li>Toyota factories and assembling plants in different parts of the globe  Which of the following examples refers to generation issues as factors influencing economic globalization?</li>
<li>Judaism It is a monotheistic religion developed among the ancient Hebrews:</li>
<li>Responsibility  Identify if the following is a right or responsibility: Following the Law</li>
<li>Magnetism It is a global city's perceived power to attract creative people and businesses from across the globe, and to "mobilize their assets" to boost economic, social and environmental development:</li>
<li>Very-long-term loans  This type of financing is provided by the Multilateral Development Banks to member countries, with maturities of 30 to 40 years, at interest rates well below market rates. These are funded through direct contributions by governments in the donor countries:</li>
<li>Right Identify if the following is a right or responsibility: Choosing own religion</li>
<li>Temporary labor migrants  These are migrants who migrate for a limited period of time in order to take up employment and send money home:</li>
<li>Hinduism  According to some scholars, the oldest living religion on Earth is ______:</li>
<li>The correct answer is 'True'. Global citizens act as glue which binds individuals together in an increasingly globalized world.</li>
<li>Regionalization It is a continuing process of forming regions as geopolitical units, as organized political cooperation within a particular group of states, and/or as regional communities such as pluralistic security communities.</li>
<li>Economic globalization is the independence of world economies as a result of the growing scale of cross-border trade of commodities and services. Which of the following statements is not true?</li>
<li>Migration What term refers to the permanent change of residence by an individual or group excluding such movements as nomadism, migrant labor, commuting, and tourism, all of which are transitory in nature?</li>
<li>Culture can be explained as a set of beliefs concerning the cause, nature, and purpose of the universe, especially when considered as the creation of a superhuman agency or agencies, usually involving devotional and ritual observances, and often containing a moral code governing the conduct of human affairs. Which of the following statements is not true?</li>
<li>Migration Planning  This is one of the importance of demography that is studying the mobilization trends of people .</li>
<li>Right Identify if the following is a right or responsibility: Running for a public office</li>
<li>Green Climate Fund  The five Multilateral Development Banks are composed of the following, except:</li>
<li>TRUE  Overseas Filipino workers usually suffers homesickness.</li>
<li>TRUE  For the faces of the filipino youth of today, internet is an need.</li>
<li>Nuclear family  ______ is the traditional type of family structure. This family type consists of two parents and children.</li>
<li>Gossiping Secrets are brought out; failures and flaws are emphasized; and relationships are destroyed.</li>
<li>Traditional Politician  What does TRAPO means?</li>
<li>Bare hands  The traditional Filipino way of eating.</li>
<li>TRUE  Lack of productivity leads to lack of happiness.</li>
<li>FALSE Conquering the world starts from conquering your parents first.</li>
<li>Extended family This family includes many relatives living together and working toward common goals, such as raising the children and keeping up with the household duties.</li>
<li>All of these  The following are the modern ways of showing Filipino nationalism:</li>
<li>Advocacy in watching Filipino Films These are statements about Colonial mentality, EXCEPT</li>
<li>Divorce or annulment  Which is NOT a Filipino value system?</li>
<li>Querida Syndrome  A country-wide cultural practice Filipino men for keeping No. 2s, the Tagalogs called them kalunya, kaagulo, or kaapid</li>
<li>FALSE The Philippines is an archipelago consist of 7,170 islands.</li>
<li>TRUE  Women in the Philippines have had high societal positions since precolonial times.</li>
<li>FALSE </li>
<li>The media such as the TV personalities has no abilities in influencing the Filipino youth of today.</li>
<li>TRUE  For the faces of the filipino youth of today, internet is an need.</li>
<li>TRAPO __________ it means politicians who will say and do anything including dirty tricks to get elected or get what they want but would not do as they promised as they got elected.</li>
<li>4 Bonus: 2+2= ___.</li>
<li>GREATEST GENERATION       [1901‑1945][WW2 Generation]BABY BOOMERS                   [1946‑1964][Post War Multiplication]GENERATION X                     [1965‑1984][Diversity, adaptable, cool]GENERATION Y                     [1978‑1990][Technological Revolution]GENERATION Z                     [1995‑2007][Technology‑driven lifestyle]</li>
<li>GREATEST GENERATION        BABY BOOMERS                    GENERATION X                      GENERATION Y                      GENERATION Z</li>
<li>TRUE  </li>
<li>The Philippines is a combined society, both Singular and Plural in form. Singular as one nation, but it is plural in that it is fragmented geographically and culturally.</li>
<li>FALSE To show Filipino Spirit, whenever we hear the Lupang Hinirang, it is ok not to stand as long as we put our right hand to our left chest.</li>
<li>Generation: GENERATION X Year: 1965-1984  </li>
<li>Greatest Generation </li>
<li>What is the generation of those who who were born during the duration of the second World War?</li>
<li>TRUE  Multitasking is the best key to be productive.</li>
<li>Generation: BABY BOOMERS Year: 1946-1964  </li>
<li>FALSE The Philippines is the most traffic nation in the world.</li>
<li>yourself  Conquering the world starts from where?</li>
<li>Mother or Nanay Cares about the Domestic Needs of the family such as Emotional Growth and Values Formation.</li>
<li>Baby boomer </li>
<li>What is the generation of those who were born immediately after the WW2 wherein great multiplication of descendants occurred?</li>
<li>Generation X  </li>
<li>What is the generation of those who who were born from 1965 to 1984 who were diverse and was able to adapt with the new idealism, religions and sexual orientation?</li>
<li>Both  What are the novels of Dr. Jose Rizal that made the Filipinos understand their current status?</li>
<li>FALSE Jose Rizal was executed in Bagumbayan in the year 1898.</li>
<li>TRUE  Even Jesus Christ raised up 12 disciples aged 19 to early 20s to change the world</li>
<li>Generation: GREATEST GENERATION Year: 1901-1945 </li>
<li>dopamine  Every accomplishment releases a happy chemical called _______ that motivates people to do even more</li>
<li>TRUE  1/3 of our Population is from ages 10 â€“ 24, the youth bracket.</li>
<li>Father or Tatay Home's Foundation or Haligi ng Tahanan</li>
<li>Nationalism _______ is the LOVE OF COUNTRY with all its INHABITANTS</li>
<li>GREATEST GENERATION       [1901‑1945][WW2 Generation]BABY BOOMERS                   [1946‑1964][Post War Multiplication]GENERATION X                     [1965‑1984][Diversity, adaptable, cool]GENERATION Y                     [1978‑1990][Technological Revolution]GENERATION Z                     [1995‑2007][Technology‑driven lifestyle]</li>
<li>GENERATION CHART</li>
<li>K.C. Ibañez, Ilocos Norte </li>
<li>We differ a lot from our views to our behavior. It’s just too bad that the older generation</li>
<li>sees this difference in a bad way. Have they forgotten that the youth now is the product of</li>
<li>what they themselves reared?</li>
<li>TRUE  Filipinos are close usually up to the SECOND DEGREE relatives.</li>
<li>Communism Karl Marx cast the vision of ________ communism in their college days.</li>
<li>FALSE Being busy and productive is just the same.</li>
<li>According to Walt Disney, "First [Think], Second [Believe], Third [Dream], and finally [Dare]".</li>
<li>According to Walt Disney, "First ,  Second , Third , and finally ".</li>
<li>FALSE Katipunan was led by Jose Rizal in their Youth</li>
<li>TRUE  ISIS trains extremist during their childhood</li>
<li>TRUE  Letting go of a marrying child is hard for the Filipino parents.</li>
<li>Walt Disney If you can dream it, you can do it. Remember that this whole thing started with a dream and a mouse.</li>
<li>Hospitality Filipinos are usually friendly and welcoming to their guests.</li>
<li>Generation Y  What is the generation of those who who were born from late 70s to early 90s who experiences the transition to technological revolution?</li>
<li>FALSE Though corruption has been a major problem of the Philippines today, according to , the nation's corruption rate is still increasing.</li>
<li>Ignite your passion Whatever irritates you about this world, that's something you need to work out!</li>
<li>Hiya  Lack of stress by not even trying to achieve but reduces one to smallness or "morality of slaves".</li>
<li>TRUE  The youth are hope of tomorrow.</li>
<li>Andres Bonifacio  KKK was headed by ________</li>
<li>Filipino time When the invitation says the program will start at 7pm, it is expected to begin at 9pm.</li>
<li>Of legal age to make decisions  The following are the strength of Filipino youth, Except:</li>
<li>TRUE  The crime rate in the Philippines increased from 2013 to 2014.</li>
<li>Colonial mentality  ________ is the thinking that foreign talents and products are always the good, the better, and the best, and that the local ones are of poor or no quality at all.</li>
<li>FALSE Interruptions are among the biggest barriers to both productivity and happiness. So don't turn off your mobile phones, you might have calls and messages from friend.</li>
<li>Epifanio Delos Santos Avenue  Where did the People Power Revolution take place?</li>
<li>FALSE In pursuing your God-given dream, strategy is not the problem but execution.</li>
<li>FALSE Philippine Propaganda Movement started with College students in the Philippines.</li>
<li>TRUE  For Filipinos, children are considered a Gift from God.</li>
<li>FALSE There are five main points in the .</li>
<li>TRUE  We still have growing numbers of Overseas Filipino Workers and they are making a big impact in our economy today.</li>
<li>Social climbing Living beyond their means.</li>
<li>TRUE  A lot of revolutions around the world arose from a youth movement.</li>
<li>TRUE  Manila used to be the Paris of Asia.</li>
<li>TRUE  There is what we called "GENERATION SEX".</li>
<li>FALSE Youth has no role in the society today, they are even the cause of majority of the problems the nation is facing.</li>
<li>None of the above An ethno-linguistic group known for their industry and austere frugality.</li>
<li>TRUE  Being Filipinos, we should respect our Philippine flag and its purpose. The history and value of this flag are connected to the freedom we have today.</li>
<li>TRUE  Youth are courageous and adventurous that's why we can hope for a better tomorrow.</li>
<li>YOUth are GIFTED by God Courageous & Adventurous YOUth REVOLUTIONS Karl Marx casted the vision of Communism in his college YOUth have a ROLE to Play YOUth have a ROLE to Play → 1/3 of our Population is from ages 10 – 24 Even Jesus Christ raised up 12 disciples aged 19 to early 20s to change the world</li>
<li>Crab mentality  Instead of helping each other to be successful, Filipinos even make ways to pull them down like discourage them from taking great opportunities, or destroying their image.</li>
<li>TRUE  Busy people has many priorities while productive people has few.</li>
<li>TRUE  Life is a series of TESTS & PROBLEMS.</li>
<li>TRUE  Marine life is considered to be one of the most diverse in the whole planet. Forests are home to fauna not found anywhere else in the world.</li>
<li>Crab mentality  Bitter view at competition that if they cannot win, then no one will.</li>
<li>Katipunan As a young person, Andres Bonifacio was ignited by the Filipino Spirit to start a movement called ______.</li>
<li>TRUE  Media in the Philippines is becoming very accessible to many through the use of internet connection.</li>
<li>Poor performance in class, Cutting classes</li>
<li>Game addiction can cause what?</li>
<li>Traditional Concept The Filipino culture was developed due to the conglomeration of the physical, intellectual, moral and spiritual aspects. This statement is according to:</li>
<li>FALSE According to C.B. Manalastas, Manila "Today’s youth is strongly influenced by new technology, becoming wild and having low morals"</li>
<li>Salamat Filipinos dont forget anyone who helped them, whether he (she) is a Filipino or not.</li>
<li>TRUE  The death of GOMBURZA awakened strong feelings of anger and resentment among the Filipinos.</li>
<li>FALSE Filipino youth of today never has emotional problems.</li>
<li>Very poor road traffic  Poor transportation system caused the Philippines to face this major problem today.</li>
<li>Mano po It is a way of giving respect to the elders and I believe that is also a way of receiving blessing to the elders.</li>
<li>TRUE  Opening of the Suez Canal to world shipping Philippine progress, liberated the Filipinos to see what is happening to the Western countries.</li>
<li>Liberalism  _______ is a political philosophy or worldview founded on ideas of LIBERTY & EQUALITY</li>
<li>Generation: GENERATION Z Year: 1995-2007  Match the following in the "Generation Chart".</li>
<li>Filipino Spirit What Filipino characteristic is that they don't easy gives up no matter what challenges they face? The Filipinos were able to keep it up until now and would possibly keep it for years and years to come.</li>
<li>TRUE  Filipinos faith in God kept them to maintain the true Filipino spirit in them.</li>
<li>TRUE  1/3 of our Population is from ages 10 â€" 24, the youth bracket.</li>
<li>FALSE There is only one language or dialect the Filipinos are using, it's called Filipino or Tagalog.</li>
<li>Filipino Pride  These are the FILIPINO talents well-known around the world in Hollywood, both in music and theater industry as well as in Sports worldwide</li>
<li>Have a conqueror's mindset  There is power in your thoughts, dreams and vision.</li>
<li>YOUth are GIFTED by God Courageous & Adventurous  </li>
<li>the science or study of the origin, development, organization, and functioning of human society; the science of the fundamental laws of social relations, institutions, etc.  All the following are definition of Euthenics EXCEPT:</li>
<li>TRUE  50% of are smokers.</li>
<li>FALSE Life is too short to have fun.</li>
<li>TRUE  There is power in the young people or youth that they have to be unleashed</li>
<li>Kataastaasan, Kagalanggalang Katipunan  What does KKK means?</li>
<li>Ignite your passion Dont lose your PASSION or the FIGHTER inside of you.</li>
<li>Epal  This habit is also common to our politicians. Instead of prioritizing their duty to give the best service to the people, they rather prioritize their thick faces to grab attention that will bring them more chance of winning in the next election</li>
<li>Ningas cogon  They are excellent at starting projects or idea execution. But after a few hours or days, they lose the excitement, and they become too lazy to finish.</li>
<li>TRUE  Yes, life is too short but it is still essential to rest so that we can recharge our batteries and be more productive.</li>
<li>Bahala na Reliance to God and His supernatural powers but promotes laziness.</li>
<li>TRUE  Karl Marx casted the vision of Communism in his college</li>
<li>FALSE YOUth are the HOPE of Today</li>
<li>Complacency Ignoring or not following simple rules and instructions</li>
<li>POWER in your THOUGHTS, DREAMS & VISION, I am WORLD CLASS, Shift from local to global thinking, I CAN DO IT!, I WILL WIN IT! How to have a CONQUEROR’S MINDSET? Check all that applies.</li>
<li>TRUE  Proper planning is essential, set daily goals then prioritize.</li>
<li>Nothing new but always the same everyday! These are examples of empowering belief Except:</li>
<li>FALSE Excuses are for the strong people.</li>
<li>YOUth REVOLUTIONS Karl Marx casted the vision of Communism in his college </li>
<li>Stepfamily  _______ involves two separate families merging into one new unit. It consists of a new husband and wife and their children from previous marriages or relationships.</li>
<li>Philippine Propaganda Movement  </li>
<li>A movement that started from the rich and middle class sector of Filipinos in Spain during their youth.</li>
<li>Love our family, our neighbors, and our compatriots The following are the modern ways of showing Filipino nationalism:</li>
<li>TRUE  The Philippines has always been fragmented and not united.</li>
<li>Tuli  _________ is considered to be a "rite of passage" for Filipino boys.</li>
<li>TRUE  Busy people keeps talking about how busy they are.</li>
<li>Generation: GENERATION Y Year: 1978-1990 Generation: GENERATION X Year: 1965-1984 Generation: BABY BOOMERS Year: 1946-1964 Generation: GREATEST GENERATION Year: 1901-1945 Generation: GENERATION Z Year: 1995-2007 Match the following in the "Generation Chart".</li>
<li>According to Gigi Zulita of Zamboanga City, "The youth before were [conservative] and [reserved]. Today’s youth is strongly influenced by [new technology], becoming [wild] and having [low] morals. -</li>
<li>According to Gigi Zulita of Zamboanga City, "The youth before were and . Today’s youth is strongly influenced by , becoming and having morals. -</li>
<li>Generation: GENERATION Y Year: 1978-1990  YOUth have a ROLE to Play YOUth have a ROLE to Play → 1/3 of our Population is from ages 10 - 24  Even Jesus Christ raised up 12 disciples aged 19 to early 20s to change the world</li>
<li>Bayanihan Referred to as the spirit of unity and mutual cooperation.</li>
<li>FALSE Based on the topic "Faces of ", game addiction is not a cause of poor performance in class.</li>
<li>FALSE We must not be aware and updated on the significant issues happening in the country to show the Filipino nationalism.</li>
<li>TRUE  Using our own language is manifesting and preserving our national identity.</li>
<li>Generational mindset  Your discomfort today will be the comfort to the next generation.</li>
<li>Jesus Christ _______ downloaded His plans to the world through His 12 disciples who are from ages 19-early 20s.</li>
<li>Have a CONQUEROR’S MINDSET, GENERATIONAL MINDSET, IGNITE YOUR PASSION, NO MORE EXCUSES, PURSUE, OVERCOME OBSTACLES To be able to conquer the world that start with yourself, we should? Select all the correct possible answers.</li>
<li>FALSE According to C.B. Manalastas, Manila "Today's youth is strongly influenced by new technology, becoming wild and having low morals"</li>
<li>integration The process of taking the limit of a sum of little quantities is called .</li>
<li>Refer to the figure.  Which of the following represents the graph drawn in red? g(x)-1</li>
<li>Differential, Integral  The 2 divisions of Calculus are:</li>
<li>4x^2+12x+9  Given f(x) = 2x + 3 and g(x) = x.  Evaluate  .  Sample text answer: 3x^2+6x-7.  Do not use space between the number, letter and symbol.</li>
<li>derivative  The slope of the tangent line is called the of the function f(x) at point P.</li>
<li>TRUE  If  f(x) and g(x)  are linear functions,  then  f(x) + g(x)  is a linear function.</li>
<li>The slope of the tangent lines at x=1 is 1 and at x=3 is -1., The slope of the tangent line at x=2 is 0.  Sketch the lines x=1, x=2, and x=3 tangent to the curve given in figure 7.  Estimate the slope of each of the tangent lines you drew.</li>
<li>largest or smallest volume of a solid, rate or speed  The following problems could be solved by differential calculus:</li>
<li>If your car will not get at least 24 miles per gallon, then it is not properly tuned. Which of the following is the contrapositive for the statement: If your car is properly tuned, it will get at least 24 miles per gallon.</li>
<li>1 If a tangent line is inclined 45 degrees, then what is the slope the tangent line?</li>
<li>g(x)-1  Refer to the figure.  Which of the following represents the graph drawn in red?</li>
<li>-(1+2h+4x)  Let f(x)=-1-x-2x2, evaluate f(x+h)−f(x)h</li>
<li>Factor out the negative sign for the final answer, if any.</li>
<li>FALSE If  a  and  b are real numbers  then (a + b) = a + b.</li>
<li>4x+9  Given f(x) = 2x + 3.  Evaluate  .  Sample text answer: 3x^2+6x-7.  Do not use space between the number, letter and symbol.</li>
<li>x - 2 y + 8  = 0  Find the equation of the line passing through (-2,3) and perpendicular to the line 4x=9-2y. Use the general equation of the line for your final answer.</li>
<li>x is in A or x is in C  Let A = {1,2,3,4,5}, B = {0,2,4,6}, and C = {-2,-1,0,1,2,3}.  Which of the values of x will satisfy each statement?</li>
<li>4x + 7y – 18 = 0  Which of the following equations is the line perpendicular to 4y – 7x = 5?</li>
<li>25/6  Let f(x) = (x-1) and define S(x) to be the slope of the line through the point (0,0) and (x,f(x)).  Evaluate S(6).</li>
<li>Continuous  Determine whether the graph is continuous or not continuous.</li>
<li>FALSE If  f(x) and g(x)  are linear functions  then  f(x)g(x)  is a linear function.</li>
<li>Not Continuous  Determine whether the graph is continuous or not continuous.</li>
<li>x-5 The slope of the line through (5,15) and (x+8, x-2x) is .</li>
<li>x is greater than or equal to -1  Which of the following will make the statement x+3 > 1 true?</li>
<li>undefined The slope of a vertical line is .</li>
<li>TRUE  If f(x) and g(x) are linear functions, the f(x) + g(x) is a linear function.</li>
<li>TRUE  For all positive real numbers a and b, if a > b, then a > b.</li>
<li>x is greater than or equal to -1  Which of the following will make the statement x+3 > 1 true?</li>
<li>Newton  Calculus was developed by Leibniz and . (Indicate only the last name)</li>
<li>-1.44 Find the slope of the line passing through the points (3,-4) and (-6,9). Use decimal value for your final answer.</li>
<li>If x is within 0.02 unit distance of 1, then f(x) is within 0.05 unit of 5. limx→13x+2=5</li>
<li>The slope of the tangent lines at x=1 is 1 and at x=3 is -1., The slope of the tangent line x=2 is 0. Sketch the lines X=1, x=2, and x=3 tangent to the curve given in figure 7.  Estimate the slope of each of the tangent lines you drew.</li>
<li>TRUE  If f(x) and g(x) are linear functions, the f(x) + g(x) is a linear function.</li>
<li>If your car will not get at least 24 miles per gallon, then it is not properly tuned. Which of the following is the contrapositive for the statement: If your car is properly tuned, it will get at least 24 miles per gallon.</li>
<li>3x + 2y =10 Which of the following equations is the line perpendicular to 2x – 3y = 9?</li>
<li>0 The slope of a horizontal line is . (Answer should be numeric)</li>
<li>x-5 The slope of the line through (5,15) and (x+8, x-2x) is .</li>
<li>FALSE If  x  divides 49, then  x  divides 30.</li>
<li>x is in A or x is in C  Let A = {1,2,3,4,5}, B = {0,2,4,6}, and C = {-2,-1,0,1,2,3}.  Which of the values of x will satisfy each statement?</li>
<li>FALSE If a and b are real numbers, then (a+b) = a+b.</li>
<li>x+4 The slope of the line from point U(5,13) and the point V(x+1, x-3) is .</li>
<li>FALSE If a and b are real numbers, then (a+b) = a+b.</li>
<li>Calculus 1 Prelim to Midterm! Quiz 1 Sketch the lines x=1, x=2, and x=3 tangent to the curve given in figure 7. Estimate the slope of each of the tangent lines you drew. (2 answers) -The slope of the tangent line at x=2 is 0. -The slope of the tangent lines at x=1 is 1 and at x=3 is -1</li>
<li></li>
<li>The slope of a vertical line is -undefined</li>
<li></li>
<li>The slope of the tangent line is called the -Derivative</li>
<li></li>
<li>The slope of a horizontal line is 0</li>
<li></li>
<li>The process of taking the limit of a sum of little quantities is called -Integration</li>
<li></li>
<li>The 2 divisions of Calculus are: -Integral -Differential</li>
<li></li>
<li>If a tangent line is inclined 45 degrees, then what is the slope the tangent line? 1</li>
<li></li>
<li>Calculus was developed by Leibniz and -Newton</li>
<li></li>
<li>The following problems could be solved by differential calculus: (2 answers) - largest or smallest volume of a solid - rate or speed</li>
<li></li>
<li>Quiz 2! Find the equation of the line passing through (-2,3) and perpendicular to the line 4x=9-2y. Use the general equation of the line for your final answer.</li>
<li></li>
<li>Find the slope of the line which is tangent to the circle with center C(3,1) at the point P(8,13).</li>
<li></li>
<li>Find the length and midpoint of the interval from x=9 to x=-2. (use decimal values for fractional answer)</li>
<li></li>
<li>Find the equation of the line which goes through the point (3,10) and is parallel to the line 7x-y=1.</li>
<li></li>
<li>Find the slope of the line passing through the points (3,-4) and (-6,9). Use decimal value for your final answer.</li>
<li></li>
<li>Find the slope and midpoint of the line segment from P(2,-3) to Q(2+n,-3+5n).</li>
<li></li>
<li>Find the line which goes through the point (2,-5) and is perpendicular to the line 3y-7x=2. (write the numerical coefficient of each term to complete the required equation)</li>
<li></li>
<li>Find an equation describing all points P(x,y) equidistant from Q(-3,4) and R(1,-3). (use the general equation of a line - input the numerical coefficient of each term of the equation below)</li>
<li></li>
<li>Find the equation of a circle with radius=6 and center C(2,-5). (write the required exponent after the ^ symbol; write the numerical coefficient of each term to complete the required equation)</li>
<li></li>
<li>Quiz 3 Refer to the figure. Which of the following represents the graph drawn in red?</li>
<li></li>
<li>An enrollment slip indicates a specific down payment based from the number of units enrolled by a student as follows: for number of units from 1 to 9, down payment is Php 5000; for number of units from 10 to 15, down payment is Php 10,000; and a down payment of Php 15,000 for units from 16 to 21. Which of the multiline functions define E(d), the down payment due on specific number of units enrolled. Unit is of integer type.</li>
<li></li>
<li>Consider the equation below: After evaluating g(-4), g(-1) and g(3), choose which graph represents the given conditions.</li>
<li></li>
<li>The figure shows the distance of a car from a measuring position located on the edge of a straight road. (a) What was the average velocity of the car from t=10 to t=30 seconds? (b) What was the average velocity of the car from t=20 to t=25 seconds?</li>
<li></li>
<li>For f(x) = 3x-2 and g(x) = x2+1, find the composite function defined by f o g(x) and g o f(x).</li>
<li></li>
<li>Note: For exponential answer, express it like x^3 for x cubed. Use lowercase letters, and do not put spaces in your answer. Answer: f o g(x) = 3x^2+1 g o f(x) = 9x^2-12x+5</li>
<li></li>
<li>A state has just adopted the following state income tax system: no tax on the first $10,000 earned, 1% of the next $10,000 earned, 2% of the next $20,000 earned, and 3% of all additional earnings. Write a multiline function for T(x), the state income tax due on earnings of x dollars.</li>
<li></li>
<li>The figure shows the temperature during a day in a place. How fast is the temperature changing from 1:00 P.M. to 7:00 P.M.? Round-off your answer to 2 decimal places.</li>
<li></li>
<li>From the figure shown, A(x) is defined to be the area bounded by the x and y axes, the horizontal line y=3 and the vertical line at x. For example A(4)=12 is the area of the 4 by 3 rectangle. (a) Evaluate A(2.5) (b) Evaluate A(4) - A(1)</li>
<li></li>
<li>Quiz 4 Let f(x)=-1-x-2x2, evaluate f(x+h)−f(x)h Factor out the negative sign for the final answer, if any.</li>
<li></li>
<li>Let f(x) = -x4-x-1, evaluate f(-1) and -2f(1).</li>
<li></li>
<li>Let f(x) = 2-x2, evaluate (a) f(x+1) and (b) f(x)+f(1).</li>
<li></li>
<li>The slope of the line through (5,15) and (x+8, x2-2x) is</li>
<li></li>
<li>Which graph represents the function</li>
<li></li>
<li>Given g(t) = t+5t−1, evaluate: (a) g(5) and (b) g(2s - 5) a) 5/2 b) s/s-3 Which graph corresponds to f(x)=x−−√?</li>
<li></li>
<li>From the figure shown, find the values of f(2), f(-1) and f(0).</li>
<li></li>
<li>If a and b are real numbers, then (a+b)2 = a2+b2. -False</li>
<li></li>
<li>If f(x) and g(x) are linear functions, the f(x) + g(x) is a linear function. -False</li>
<li></li>
<li>Let f(x) = 1-(x-1)2 evaluate (a)f(2)f(3) and (b)f(23) a) 0 b) 8/9</li>
<li></li>
<li>Let A = {1,2,3,4,5}, B = {0,2,4,6}, and C = {-2,-1,0,1,2,3}. Which of the values of x will satisfy each statement? = x is in A or x is in C</li>
<li></li>
<li>From the graph shown, find: a. f(-1) b. f(0) c. 3f(2) d. the value of x that corresponds to f(x)=0</li>
<li></li>
<li>Let f(x)=1-(x-3)2, evaluate: (a) f(x+3), (b) f(3-x), and (c) f(2x+1).</li>
<li></li>
<li>From the graph shown, find the values of f(-3), f(-1), f(0), and f(1).</li>
<li></li>
<li>Which of the following is the contrapositive for the statement: If your car is properly tuned, it will get at least 24 miles per gallon. -If your car will not get at least 24 miles per gallon, then it is not properly tuned</li>
<li></li>
<li>Find the slope of the line through (-5,3) and (x+1, x-2). x-5/x+6</li>
<li></li>
<li>Find the slope of the line through (-3-1) and (x+3, y+1). y+2/x+6 (wrong) y/x(wrong) x-5/x+6 (try)</li>
<li></li>
<li>Given the function f(x)=3x-4, evaluate: (a) f(x-2), (b) f(x)-f(2), (c) f(1)/f(3), and (d) f(1/3). Use fraction as final answer, if any. a) 3x-10 b) 3x-6 c) -1/5 d) -3</li>
<li></li>
<li>Find the slope of the line through (0,0) and (x-1, x2-1). Answer: m = x+1</li>
<li></li>
<li>Let f(x)=1-(x-3)2, evaluate: (a) f(x+3), (b) f(3-x), and (c) f(2x+1).</li>
<li></li>
<li>Evaluate f(3), g(-1), and h(4). f(3) = 1 g(-1) = -2 h(4) = 1</li>
<li></li>
<li>Which of the following will make the statement x2+3 > 1 true? x is greater than or equal to -1</li>
<li>Encapsulation It is the method of hiding certain elements of the implementation of a certain class?</li>
<li>1 What is the return value of this method: int test(){return 1;} ?</li>
<li>35087 When was the officially released of Java?</li>
<li>if (x Which statement will check if x is less than y?</li>
<li>All of the choices  Which of the following is a valid nexDouble() return value?</li>
<li>. Platform independent  The Java feature, "write once, run anywhere", is termed as</li>
<li>if (boolean_expression) Which of the following has the correct form for an if statement?</li>
<li>Runtime errors occur during run-time. Which of the following is true about Runtime errors:</li>
<li>short x=1; int y = x; Which of the following will do implicit cast?</li>
<li>test  What is the name of this method: int test(){return 1;} ?</li>
<li>11  What is the output of the code snippet below: void main(){test();test();} void test(){System.out.print(“1”);}</li>
<li>stringArray[5]; Which of the following correctly accesses the sixth element stored in an array of 10 elements?</li>
<li>Class What do you call a blueprint of an object?</li>
<li>java HelloWorld What is the correct statement to run Java program in command line?</li>
<li>None of the above "What will be the value of x after you execute this statement int z=0; for(int x=0; x<10 for="" int="" td="" x="" y="" z=""></li>
<li>To make JavaC available or accessible in command line.  Why do we need to set the path for JavaC in command line?</li>
<li>Static  Which of the following is not the feature of java?</li>
<li>The program will display an input dialog box that allows the user to input text and returns String value. What will happen if you use JOptionPane. showInputDialog statement in your program?</li>
<li>int x = 1;  Which of the following is not a valid variable declaration in Java?</li>
<li>5 What is the maximum index of the array: int[] intArray = { 1, 2, 3, 5, 6, 7 };</li>
<li>29  What is the index number of the last element of an array with 30 elements?</li>
<li>void test(int x){} void test(double x){}  Which of the following shows Overloading method?</li>
<li>Class It is a template for creating an object?</li>
<li>1.01  What is the output of the code snippet below:</li>
<li>none of the choices or all  Which of the following is not a valid Float value?</li>
<li>name  Which of the following is a valid identifier?</li>
<li>java  What is the extension name of a Java Source code?</li>
<li>Source Code What is the input for Java Compiler?</li>
<li>1010  Which of the following is a valid nextInt() return value?</li>
<li>All of the statements are correct What is floating-point literal?</li>
<li>C:\Program Files\Java\jdk1.6.0_23\bin What is the correct statement to set JavaC path in command line?</li>
<li>Accessor  It used to read values from class variables?</li>
<li>String str = JOptionPane.showInputDialog(""); Which of the following is a valid statement to accept String input?</li>
<li>TRUE  What is the result if we execute this: “a”.equals(“a”);?</li>
<li>None of the choices Which of the following is a valid statement to accept int input? Let us assume that we have declared scan as Scanner.</li>
<li>public abstract class Person {} Which of the following class declaration is not allowed to be instantiated?</li>
<li>switch  Which is not a repetition control structure?</li>
<li>765321  "What is the output of the code snippet below: int[] intArray = { 1, 2, 3, 5, 6, 7 }; for(int x = intArray.length-1; x>=0; x--){System.out.print(intArray[x]);}"</li>
<li>int What is the return type of this method: int test(){return 1;} ?</li>
<li>All of the choices  Which of the following creates an instance of a class?</li>
<li>6 What is the length of the array: int[] intArray = { 1, 2, 3, 5, 6, 7 };</li>
<li>Multithreaded The feature of Java which makes it possible to execute several tasks simultaneously.</li>
<li>name  Which of the following is not a java keyword?</li>
<li>print "Hello World" infinitely  "What will be the output if you execute this code? do{System.out.println(""Hello World!"");}while(true);"</li>
<li>. Oak What was the initial name of the Java programming language?</li>
<li>It depends, if there is a compiler embedded in Notepad. Can we directly compile codes from notepad?</li>
<li>id_1  Which of the following a valid Java identifier?</li>
<li>super Which of the following is the correct way to call the constructor of the parent class?</li>
<li>5 From the array int[] intArray = { 1, 2, 3, 5, 6, 7 };, what is the value of intArray[3]?</li>
<li>None of the choices Which of the following we are not allowed to write java source code?</li>
<li>short x=1; int y = x  Which of the following will do implicit cast?</li>
<li>Declaration Comments  Which of the following is not a Java comment?</li>
<li>4 From the array int[] intArray = { 1, 2, 3, 5, 6, 7 };, what is the value of intArray[2]?</li>
<li>TRUE  "What will be the value of intResult or booleanResult if we execute the following expressions? booleanResult = !((a + c) > b) && x;"</li>
<li>None of the choices Which of the following is not usable for writing java source code?</li>
<li>19  What is the index number of the last element of an array with 20 elements?</li>
<li>TRUE  "What will be the value of intResult or booleanResult if we execute the following expressions? booleanResult = x && y || x;"</li>
<li>0 "int[] intArray = new int[10]; for(int x = 0; x</li>
<li>All of the choices  Which of the following declares an array of int named intArray?</li>
<li>Polymorphism  It is the ability of an object to have many forms?</li>
<li>TRUE  What is the result if we execute this: “a” instanceof String; ?</li>
<li>public class Person implements [InterfaceName] {} Which of the following is the correct way to use an interface?</li>
<li>None of the choices Which is not a decision control structure?</li>
<li>The program will display message dialog box.  What will happen if you use JOptionPane.showMessageDialog statement in your program?</li>
<li>print "Hello World" "What will be the output if you execute this code? do{System.out.println(""Hello World!"");}while(false)"</li>
<li>void  What is the return value of this method: public void sum(){int x=1;} ?</li>
<li>Oak What was the initial name for the Java programming language?</li>
<li>All of the choices  Which of the following show casting object?</li>
<li>extends What keyword is used to perform class inheritance?</li>
<li>None of the choices Which of the following is not Java Literal?</li>
<li>All of the statements are correc  Which of the following is true about Interface?</li>
<li>. int 25  What will be the value of x if we execute this: String s = "25"; int x = Integer.parseInt(s); ?</li>
<li>"int a[] = new int[1]; System.out.println(a[1]);" What will be the output if you execute this code:</li>
<li>Class Variable  What do you call a variable that belong to the whole class?</li>
<li>Yes, because we can call Java compiler from NetBeans  Can we directly compile codes from NetBeans?</li>
<li>none of the choices Which statement will check if x is equal to y?</li>
<li>111111  "void main(){test(“11”);test(“1”);} void test(String x){System.out.print(x + x);}"</li>
<li>nextLine()  Which of the following method reads input from the user and return String value?</li>
<li>Subclass  What do you call a class that inherits a class?</li>
<li>String  Which of the following is not a primitive data type?</li>
<li>public final class Person {}  Which of the following class declaration is not allowed to be inherited?</li>
<li>None of the choices Which of the following does not return numeric value?</li>
<li>public final void setName(){} Which of the following method is allowed to be overriden?</li>
<li>11  What will be the value of x after executing this code</li>
<li>Interpreting bytecode JVM is responsible for</li>
<li>Interpreting bytecode What is the function of JVM?</li>
<li>All of the choices  Which of the following is a valid multidimensional array?</li>
<li>public interface [InterfaceName] {} Which of the following is the correct way to define an interface?</li>
<li>Byte Code What did java generates after compiling the java source code?</li>
<li>none of the choices Which of the following is not an escape sequence?</li>
<li>1 "What will be the value of intResult or booleanResult if we execute the following expressions? intResult = 1;"</li>
<li>package ; Which of the following is the correct syntax to define a method?</li>
<li>String  What type of value does the nextLine() returns?</li>
<li>There will be a syntax error after compilation. What will happen if we compile the statement below? ~System.out.println(“Hello World!”)</li>
<li>3 Which of the following is a valid nextByte() return value?</li>
<li>1.01  "void main(){test(1.0); test(1);} void test(double x){ System.out.print(x); void test(int x){System.out.print(x);}"</li>
<li>javac HelloWorld.java What is the correct statement to compile Java program in command line?</li>
<li>12  What will be the value of x after executing this code for(int x=0; x<=11; x++) {} is run?</li>
<li>compute Which of the following is a valid method name:</li>
<li>All of the statements are true  Which of the following is true about syntax errors:</li>
<li>18  intResult += c;</li>
<li>1 intResult = b % a;</li>
<li>15  intResult = ++b * a + c;</li>
<li>48  intResult = b << c;</li>
<li>2 intResult = a & b;</li>
<li>11  intResult = a | b + c;</li>
<li>8 intResult = a >> 2;</li>
<li>1 intResult = 1;</li>
<li>TRUE  booleanResult = !((a + c) > b)   && x;</li>
<li>TRUE  booleanResult = x && y || x;</li>
<li>C:\Program Files\Java\jdk1.6.0_23\bin, < JavaC directory >, All of the given choices are correct  What is the correct statement to set JavaC path in command line?</li>-->