<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>BioWeb/Sequence</title>
        <link rel="stylesheet" href="stylle.css">
    </head>
    <body style="height:100%">
        <div class="nav">
            <a href="home.php">Logout</a>
            <a href="profile.php">Profile</a>
            <a href="register.php">Register</a>
            <a href="about.php">About</a>
            <a href="home.php">Home</a>        
        </div>
        <div class="seqback" style="margin-top: 0px;height:730px;">
            <div class="seq">
                <form method="POST" action="function.php">
                    <div class="container">
                            <p class="avail" style="padding-top: 30px;">Available Sequence:<br></p>
                            <p class="seq_title">Mitchondrian Genes Sequence Of Rattus Norvegicus</p>
                            <textarea style="width: 800px; height: 300px; margin-top: 20px; margin-bottom: 10px; font-family: Arial, sans-serif; font-size: 15px; line-height: 1.5; padding: 10px; background-color: #f2f2f2; border: 1px solid #ccc; border-radius: 5px; white-space: pre-wrap; word-wrap: break-word;" readonly><?php
                                    if (isset($_SESSION['gene_data'])) {
                                        $gene_data = $_SESSION['gene_data'];
                                        foreach($gene_data as $gene_id => $gene_sequence){
                                            echo "\n";
                                            echo "\n";
                                            echo "Gene ID : ". $gene_id . "\n";
                                            echo "Gene Seq: $gene_sequence "."\n \n";
                                            echo "------------------------------------------------------------------------------------------------------------------------------------------------------------";
                                            
                                        }
                                    }
                            ?></textarea>
                            <label for="choose">Choose Gene ID From The Above Genes: </label><br>
                            <input type="text" id="choose" name="choose" placeholder="Gene ID">
                            <br><br>
                            <label for="substring">Enter Another Sequence: 
                            </label><br>
                            <input type="text" id="substring" name="substring" placeholder="Sequence">
                            <br><br>
                            <label for="operations">Choose your operation</label><br>
                            <select id="operations" name="operation">
                              <option value="GC_Percentage">GC Content</option>
                              <option value="Complement">Complement</option>
                              <option value="Translation">Protein Translation</option>
                              <option value="Reverse_Complement">Reverse Complement</option>
                              <option value="nBases_Count">N bases Filter</option>
                              <option value="toRNA">From DNA to RNA</option>
                              <option value="toDNA">From RNA TO DNA</option>
                          </select>
                        <input type="submit" class="submitbutton" name="sequence_submit">
                    </form>
                </div>
            </div>
        </div>
            <div class="contact_info">
                    <p class="contact">Contact Us:</p>
                    <p class="contact2">
                    <span><img class="phone" src="telephone.png">+20 1123456789</span>
                    <span><img class="email" src="email.png">ahmed123456@gmail.com</span>
                    <span><img class="location" src="icons8-location-50.png">2001 Zimmerman Lane, New York</span>
                    </p>
                    <p class="contact-info-text">Get in touch with us if you have any questions or comments.</p>
            </div>
    </body>
</html>
