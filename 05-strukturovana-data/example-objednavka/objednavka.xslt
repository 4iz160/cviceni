<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:xs="http://www.w3.org/2001/XMLSchema"
    exclude-result-prefixes="xs"
    version="2.0">
    
    <xsl:output method="html" version="5"/>
    
    <xsl:template match="/">
        <html lang="cs">
            <head>
                <title>Objednávka <xsl:value-of select="objednavka/cisloObjednavky"/></title>
            </head>
            <body>
                <xsl:apply-templates/>
            </body>
        </html>
    </xsl:template>
    
    <xsl:template match="objednavka">
        <xsl:apply-templates select="cisloObjednavky"/>
        <table>
            <tr>
                <th>Název</th>
                <th>Počet</th>
                <th>Cena</th>
            </tr>
            <xsl:apply-templates select="polozka"/>
        </table>
    </xsl:template>
    
    <xsl:template match="cisloObjednavky">
        <h1>
            <xsl:text>Objednávka </xsl:text>
            <xsl:value-of select="text()"/>
        </h1>
    </xsl:template>
    
    <xsl:template match="polozka">
        <tr>
            <td><xsl:value-of select="nazev"/></td>
            <td><xsl:value-of select="pocet"/></td>
            <td><xsl:apply-templates select="cena"/></td>
        </tr>
    </xsl:template>
    
    <xsl:template match="cena">
        <xsl:value-of select="text()"/>
        <xsl:text> </xsl:text>
        <xsl:value-of select="@mena"/>
    </xsl:template>
    
</xsl:stylesheet>